<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
class AdminForgotPasswordController extends Controller
{
    // Forgot Password Page
    public function forgotPassword()
    {
        return view('admin.auth.forgot_password');
    }

    // Check Security Question
   public function checkQuestion(Request $request)
{
    $request->validate([
        'email' => 'required',
        'security_question' => 'required',
        'security_answer' => 'required',
        'iv' => 'required'
    ]);

    $user = User::where('email', $request->email)
        ->where('security_question',
            $request->security_question)
        ->first();

    if (!$user) {

        return back()->withErrors([
            'error' =>
                'Invalid username or security question.'
        ]);
    }

    // decrypt answer
    $answer = $this->decryptAnswer(
        $request->security_answer,
        $request->iv
    );

    // compare answer
    if (
        strtolower(trim($user->security_answer))
        != strtolower(trim($answer))
    ) {

        return back()->withErrors([
            'error' =>
                'Security answer incorrect.'
        ]);
    }

    Session::put('reset_user_id', $user->id);

    return redirect()->route('reset.password');
}

    // Reset Password Page
    public function resetPassword()
    {
        if (!Session::has('reset_user_id')) {
            return redirect()->route('forgot.password');
        }

        return view('admin.auth.reset_password');
    }

    // Update Password
    public function updatePassword(Request $request)
{
    if (!Session::has('reset_user_id')) {

        return redirect()
            ->route('forgot.password');
    }

    $request->validate([
        'password' => 'required',
        'password_confirmation' => 'required',
        'password_iv' => 'required',
        'confirm_password_iv' => 'required'
    ]);

    // decrypt password
    $password = $this->decryptData(
        $request->password,
        $request->password_iv
    );

    // decrypt confirm password
    $confirmPassword = $this->decryptData(
        $request->password_confirmation,
        $request->confirm_password_iv
    );

    // match check
    if ($password != $confirmPassword) {

        return back()->withErrors([
            'error' =>
                'Password and Confirm Password do not match.'
        ]);
    }

    // minimum length check
    if (strlen($password) < 6) {

        return back()->withErrors([
            'error' =>
                'Password minimum 6 characters required.'
        ]);
    }

    $user = User::find(
        Session::get('reset_user_id')
    );

    if (!$user) {

        return redirect()
            ->route('forgot.password');
    }

    // update password
    $user->password = Hash::make($password);

    $user->save();

    Session::forget('reset_user_id');

   return Redirect::to('/admin')->withMessage('Password updated successfully.');
}
    private function decryptAnswer($cipherText, $ivBase64)
{
    $secretKey = "my_secret_key_123456";

    $key = hash('sha256', $secretKey, true);

    $iv = base64_decode($ivBase64);

    $decrypted = openssl_decrypt(
        base64_decode($cipherText),
        'AES-256-CBC',
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );

    return $decrypted;
}
private function decryptData($cipherText, $ivBase64)
{
    $secretKey = "my_secret_key_123456";

    $key = hash('sha256', $secretKey, true);

    $iv = base64_decode($ivBase64);

    $decrypted = openssl_decrypt(
        base64_decode($cipherText),
        'AES-256-CBC',
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );

    return $decrypted;
}
}
