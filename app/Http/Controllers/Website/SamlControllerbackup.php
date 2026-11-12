<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SamlAuthFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\RobRichards\XMLSecLibs\XMLSecurityDSig;
use OneLogin_Saml2_Error;
use OneLogin_Saml2_Settings;
use OneLogin_Saml2_Utils;

class SamlController extends Controller
{
    protected $factory;
   
    public function __construct(SamlAuthFactory $factory)
    {
        $this->factory = $factory;
    }

    // Old PHP: index.php?sso
    public function sso()
    {
       
        $auth = $this->factory->make();
       
        $ssoBuiltUrl = $auth->login(null, [], false, false, true);
      
        Session::put('AuthNRequestID', $auth->getLastRequestID());

        return redirect()->away($ssoBuiltUrl)
            ->header('Pragma', 'no-cache')
            ->header('Cache-Control', 'no-cache, must-revalidate');
    }

    // Old PHP: index.php?acs
    public function acs(Request $request)
    {
		
        $auth = $this->factory->make();
         $ssoBuiltUrl = $auth->login(null, [], false, false, true);
         
        Session::put('AuthNRequestID', $auth->getLastRequestID());
        $requestId = Session::get('AuthNRequestID');
        
       $auth->processResponse($requestId);
        $errors = $auth->getErrors();

        if (!empty($errors)) {
            return response('SAML ACS error: ' . implode(', ', $errors), 401);
        }
  
        if (!$auth->isAuthenticated()) {
            return redirect()->route('saml.sso');
        }

        $attributes = $auth->getAttributes();
        
        Session::put('samlUserdata', $attributes);
        Session::put('samlNameId', $auth->getNameId());
        Session::put('samlNameIdFormat', $auth->getNameIdFormat());
        Session::put('samlNameIdNameQualifier', $auth->getNameIdNameQualifier());
        Session::put('samlNameIdSPNameQualifier', $auth->getNameIdSPNameQualifier());
        Session::put('samlSessionIndex', $auth->getSessionIndex());
        Session::put('login_time_stamp', time());
        
        $this->loginLaravelUser($attributes, $auth->getNameId());

        $relayState = $request->input('RelayState');
        if (!empty($relayState) && OneLogin_Saml2_Utils::getSelfURL() !== $relayState) {
            return redirect()->away($relayState);
        }

        return redirect(config('saml.login_redirect', '/admin/dashboard'));
    }

    // Old PHP: index.php?slo / singlelogout.php
    public function slo()
    {
        $auth = $this->factory->make();
       
        $auth->logout(
            null,
            [],
            Session::get('samlNameId'),
            Session::get('samlSessionIndex'),
            false,
            Session::get('samlNameIdFormat'),
            Session::get('samlNameIdNameQualifier'),
            Session::get('samlNameIdSPNameQualifier')
        );

        exit;
    }

    // Old PHP: index.php?sls
    public function sls()
    {
        $auth = $this->factory->make();
        $requestId = Session::get('LogoutRequestID');

        $auth->processSLO(false, $requestId);
        $errors = $auth->getErrors();

        if (!empty($errors)) {
            return response('SAML SLS error: ' . implode(', ', $errors), 400);
        }

        Auth::logout();
        Session::flush();
        Session::invalidate();
        Session::regenerateToken();

        return redirect(config('saml.logout_redirect', '/saml/logout-success'));
    }

    // Old PHP: attrs.php
    public function attributes()
    {
        abort_unless(Session::has('samlUserdata'), 401);

        return view('saml.attributes', [
            'attributes' => Session::get('samlUserdata', []),
        ]);
    }

    // Old PHP: metadata.php
    public function metadata()
    {
        require_once app_path('Libraries/SAML/_toolkit_loader.php');

        try {
            $settings = new OneLogin_Saml2_Settings(app(\App\Services\SamlSettingsService::class)->settings(), true);
            $metadata = $settings->getSPMetadata();
            $errors = $settings->validateMetadata($metadata);

            if (!empty($errors)) {
                throw new OneLogin_Saml2_Error(
                    'Invalid SP metadata: ' . implode(', ', $errors),
                    OneLogin_Saml2_Error::METADATA_SP_INVALID
                );
            }

            return response($metadata, 200)->header('Content-Type', 'text/xml');
        } catch (\Throwable $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function logoutSuccess()
    {
        return view('saml.logout-success');
    }

    private function loginLaravelUser(array $attributes, $nameId): void
    {
        if (!config('saml.auto_create_user', true)) {
            return;
        }

        $email = $this->firstAttribute($attributes, config('saml.attr_email'));
        $username = $this->firstAttribute($attributes, config('saml.attr_username'));
        $name = $this->firstAttribute($attributes, config('saml.attr_name'));
        
        if (!$email) {
            // Fallback for IAM where user_name is received but email is not received.
            $email = ($username ?: $nameId ?: 'saml_user') . '@iam.local';
        }

        if (!$name) {
            $name = $username ?: $nameId ?: $email;
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make(Str::random(40));

            // Your Admin middleware/LoginController checks auth()->user()->type.
            // Set type=1 only if this column exists in your live database.
            if (Schema::hasColumn('users', 'type')) {
                $user->type = 1;
            }

            $user->save();
        }

        Auth::login($user);
    }

    private function firstAttribute(array $attributes, $key)
    {
        if (!$key || !isset($attributes[$key])) {
            return null;
        }

        $value = $attributes[$key];
        if (is_array($value)) {
            return $value[0] ?? null;
        }

        return $value;
    }
}
