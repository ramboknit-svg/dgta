<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Exception;
use Carbon\Carbon;
use DB;
use DateTime;
use App\Helpers\Helper;

class AdminController extends Controller
{

    public function profile(){

        $registeredUsers = User::query()->where(['verified' => 1, 'status' => 1,'type' =>2])->get();
       
      

        $countRegisteredUsers = isset($registeredUsers) && $registeredUsers != null ? count($registeredUsers) : 0;
       
      

        return view('admin/profile')
                ->withCountRegisteredUsers($countRegisteredUsers);

    }

    public function changePasswordView(){

        return view('admin/change_password');

    }

//     public function changePassword(Request $request)
//     {
      
//        $validator = Validator::make($request->all(), [
//     'old_password'      => 'required',
//     'password' =>'required',
//             'confirm_password' => 'required|same:password',
// ],



// );


//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator)->withInput();
//         } else {

//             $current_password = Auth::User()->password;
//             $user = auth()->user();
           
//             if(\Hash::check($request->old_password, $current_password)) {
//                 if (\Hash::check($request->password, $user->password)) {
//                     $message = "Previous passwords cannot be taken.";
                   
//                     return redirect()->back()->withMessage($message);
//                 }

//                 $user_id = Auth::User()->id;
//                 $obj_user = User::find($user_id);

//                 // dd($request->new_password);
//                 $obj_user->password = Hash::make($request->password);
//                 // dd($obj_user->password);

//                 if($obj_user->update()) {
                   
//                     $message = "Password updated successfully.";
//                     return redirect()->back()->withMessage($message);
//                 } else {
                   
//                     return redirect()->back()->withErrors($validator)->withInput();
//                 }
//             } else {
               
//                 $message = "Old Password Not Matched.";
//                 return redirect()->back()->withErrors($message);

//             }
//         }

//     }

    public function getProfile(){

        $user = auth()->user();

        return view('admin.update_profile')->withUser($user);

    }

    public function updateProfile(Request $request){

        $rules = array(
            'name' => 'required',
            'profile_image' => 'sometimes|mimes:jpg,jpeg,png,gif'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        else{

            $user = auth()->user();

            $user->name = $request->input('name');
			$user->email = $request->input('email');

            if ($request->hasFile('profile_image')) {

                try {

                    $profile_image = $request->file('profile_image');

                    $name = str_replace(' ', '', $profile_image->getClientOriginalName());

                    $name = time().$name;

                    $destinationFolder = public_path('/profile_pictures/admin-' . $user->id . '/');

                    // Delete folder
                    if(file_exists($destinationFolder.$name)){

                        unlink($destinationFolder.$name);
                    }

                    $profile_image->move($destinationFolder, $name);
                    $user->profile_image ="/public/profile_pictures/admin-".$user->id.'/'.$name;
                    
                } catch (\Exception $e) {
                    
                    return redirect()->back()->withErrors($e->getMessage());
                }
            }

            $user->update();

            return Redirect::to('admin/profile');
        }


    }
   
public function changePassword(Request $request)
{
    $oldPassword = $this->decryptPassword($request->old_password, $request->old_password_iv);
    $newPassword = $this->decryptPassword($request->password, $request->password_iv);
    $confirmPassword = $this->decryptPassword($request->confirm_password, $request->confirm_password_iv);

    $request->merge([
        'old_password' => $oldPassword,
        'password' => $newPassword,
        'confirm_password' => $confirmPassword,
    ]);

    $validator = Validator::make($request->all(), [
        'old_password'      => 'required',
        'password'          => 'required',
        'confirm_password'  => 'required|same:password',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    } else {

        $current_password = Auth::User()->password;
        $user = auth()->user();

        if (\Hash::check($request->old_password, $current_password)) {

            if (\Hash::check($request->password, $user->password)) {
                $message = "Previous passwords cannot be taken.";

                return redirect()->back()->withMessage($message);
            }

            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);

            $obj_user->password = Hash::make($request->password);

            if ($obj_user->update()) {

                $message = "Password updated successfully.";
                return redirect()->back()->withMessage($message);

            } else {

                return redirect()->back()->withErrors($validator)->withInput();
            }

        } else {

            $message = "Old Password Not Matched.";
            return redirect()->back()->withErrors($message);
        }
    }
}
   
   private function decryptPassword($cipherText, $iv)
{
    $secretKey = "my_secret_key_123456";

    $key = hash('sha256', $secretKey, true);

    return openssl_decrypt(
        base64_decode($cipherText),
        'AES-256-CBC',
        $key,
        OPENSSL_RAW_DATA,
        base64_decode($iv)
    );
} 
   
   
}
