<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
 use Illuminate\Support\Facades\RateLimiter;
 use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

   public function index(){
        
        
        return view('admin.admin_dashboard');

    }

    public function loginPage(){

        return view('admin.auth.login');

    }
    public function login(Request $request)
{
    $ipKey = 'login_attempt_' . request()->ip();
    $lockKey = 'login_disabled_' . request()->ip();
    $maxAttempts = 3;
    $lockTime = 30 * 60; // 30 minutes in seconds

    // Check if locked (GLOBAL - all browsers)
    if (Cache::has($lockKey) && now()->timestamp < Cache::get($lockKey)) {
        return Redirect::to('/admin')
            ->withErrors("Too many login attempts. Try again after 30 minutes.");
    }

    $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return Redirect::to('/')
            ->withErrors("Email and Password are required.")
            ->withInput($request->except('password'));
    }

    $password = $request->password;

    // decrypt ONLY password (if encrypted)
    if ($request->iv) {
        $password = $this->decryptPassword(
            $request->password,
            $request->iv
        );
    }

    $remember_me = $request->has('remember');

    $userdata = [
        'email' => $request->email,
        'password' => $password,
    ];

    if (Auth::attempt($userdata, $remember_me)) {

        // Clear attempts on success (GLOBAL)
        Cache::forget($ipKey);
        Cache::forget($lockKey);

        if (
            auth()->user()->type == 2 ||
            auth()->user()->type == 3
        ) {
            Auth::logout();

            return Redirect::to('/admin')
                ->withErrors(
                    "Forbidden! You do not have permission to access this route."
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Regenerate Current Session
        |--------------------------------------------------------------------------
        */
        $request->session()->regenerate();

        /*
        |--------------------------------------------------------------------------
        | SINGLE USER LOGIN
        |--------------------------------------------------------------------------
        | If same user logs in from another browser/device,
        | delete all previous sessions of that user.
        |--------------------------------------------------------------------------
        */

        $userId = Auth::id();

        $currentSessionId = $request->session()->getId();

        DB::table('sessions')
            ->where('user_id', $userId)
            ->where('id', '!=', $currentSessionId)
            ->delete();


        return Redirect::to('admin/dashboard');
    }

    // Wrong password → increment attempt (GLOBAL)
    $attempts = Cache::get($ipKey, 0) + 1;

    Cache::put(
        $ipKey,
        $attempts,
        $lockTime
    );

    if ($attempts >= $maxAttempts) {

        Cache::put(
            $lockKey,
            now()->timestamp + $lockTime,
            $lockTime
        );

        return Redirect::to('/admin')
            ->withErrors(
                "Too many login attempts. Login disabled for 30 minutes."
            );
    }

    $remaining = $maxAttempts - $attempts;

    return Redirect::to('/admin')
        ->withErrors(
            "Wrong credentials. Attempts left: $remaining"
        );
}
public function loginss(Request $request)
{
    $ipKey = 'login_attempt_' . request()->ip();
    $lockKey = 'login_disabled_' . request()->ip();
    $maxAttempts = 3;
    $lockTime = 30 * 60; // 30 minutes in seconds

    // Check if locked (GLOBAL - all browsers)
    if (Cache::has($lockKey) && now()->timestamp < Cache::get($lockKey)) {
        return Redirect::to('/admin')->withErrors("Too many login attempts. Try again after 30 minutes.");
    }

    $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return Redirect::to('/')
            ->withErrors("Email and Password are required.")
            ->withInput($request->except('password'));
    }
   $password = $request->password;

// decrypt ONLY password (if encrypted)
if ($request->iv) {
    $password = $this->decryptPassword($request->password, $request->iv);
}

    $remember_me = $request->has('remember');
    $userdata = [
        'email' => $request->email,
        'password' =>   $password,
    ];

    if (Auth::attempt($userdata, $remember_me)) {

        // Clear attempts on success (GLOBAL)
        Cache::forget($ipKey);
        Cache::forget($lockKey);

        if (auth()->user()->type == 2 || auth()->user()->type == 3) {
            Auth::logout();
            return Redirect::to('/admin')->withErrors("Forbidden! You do not have permission to access this route.");
        }

        return Redirect::to('admin/dashboard');
    }

    // Wrong password → increment attempt (GLOBAL)
    $attempts = Cache::get($ipKey, 0) + 1;
    Cache::put($ipKey, $attempts, $lockTime);

    if ($attempts >= $maxAttempts) {
        Cache::put($lockKey, now()->timestamp + $lockTime, $lockTime);

        return Redirect::to('/admin')->withErrors("Too many login attempts. Login disabled for 30 minutes.");
    }

    $remaining = $maxAttempts - $attempts;

    return Redirect::to('/admin')->withErrors("Wrong credentials. Attempts left: $remaining");
}
   
private function decryptPassword($cipher, $iv)
{
    $secret = 'my_secret_key_123456';
    $key = hash('sha256', $secret, true);

    $iv = base64_decode($iv);
    $cipher = base64_decode($cipher);

    return openssl_decrypt(
        $cipher,
        'AES-256-CBC',
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );
}
// public function login(Request $request)
// {
//     $ipKey = 'login_attempt_'.request()->ip();
//     $lockKey = 'login_disabled_'.request()->ip();
//     $maxAttempts = 3;
//     $lockTime = 30 * 60; // 10 minutes in seconds; 

//     // Check if locked
//     if (Session::has($lockKey) && now()->timestamp < Session::get($lockKey)) {
//         return Redirect::to('/admin')->withErrors("Too many login attempts. Try again after 1 hour.");
//     }

//     $rules = [
//         'email' => 'required',
//         'password' => 'required'
//     ];

//     $validator = Validator::make($request->all(), $rules);

//     if ($validator->fails()) {
//         return Redirect::to('/')
//             ->withErrors("Email and Password are required.")
//             ->withInput($request->except('password'));
//     }

//     $remember_me = $request->has('remember');
//     $userdata = [
//         'email' => $request->email,
//         'password' => $request->password,
//     ];

//     if (Auth::attempt($userdata, $remember_me)) {
//         // Clear attempts on success
//         Session::forget($ipKey);
//         Session::forget($lockKey);

//         if (auth()->user()->type == 2 || auth()->user()->type == 3) {
//             Auth::logout();
//             return Redirect::to('/admin')->withErrors("Forbidden! You do not have permission to access this route.");
//         }

//         return Redirect::to('admin/dashboard');
//     }

//     // Wrong password → increment attempt
//     $attempts = Session::get($ipKey, 0) + 1;
//     Session::put($ipKey, $attempts);

//     if ($attempts >= $maxAttempts) {
//         // Lock for 1 hour
//         Session::put($lockKey, now()->timestamp + $lockTime);
//         return Redirect::to('/admin')->withErrors("Too many login attempts. Login disabled for 30 minutes.");
//     }

//     $remaining = $maxAttempts - $attempts;
//     return Redirect::to('/admin')->withErrors("Wrong credentials. Attempts left: $remaining");
// }

    public function logout(Request $request) {

        Auth::logout();
        return Redirect::to('/admin')->withMessage('Logged out successfully.');
     //return Redirect::to('/saml/logout-success')->withMessage('Logged out successfully.');
    }
}
