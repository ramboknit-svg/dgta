<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function index(){

      $users = User::whereNotIn('type', [1,5])->orderBy('id','DESC')->get();
     
    
        return view('admin.user.user_list')->withUsers($users);

    }

    public function addUserForm(){

         $users = User::whereNotIn('type', [1,5])->orderBy('id','DESC')->get();
     

        return view('admin.user.add_user',compact('users'));

    }

    public function getUser(Request $request, $id)
    {
        try {
            
            $user = User::query()->where(['id' => $id])->first();
              $users = User::whereNotIn('type', [1,5])->orderBy('id','DESC')->get();

            return view('admin.user.update_user',compact('user','users'));
        
        }catch(Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }
    }

    public function addUser(Request $request){
    

        if($request->isMethod('post')){

            try{

                $requestData = $request->all();

                $password = 'admin@123';

                $requestData['password'] = bcrypt( $password );
              
               
                $randomDigit = rand(0, 9);

                  if ($request->hasFile('profile_image')) {

                    try {

                        $profile_image = $request->file('profile_image');

                        $name = str_replace(' ', '', $profile_image->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/profile_pictures/' . $randomDigit . '/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $profile_image->move($destinationFolder, $name);
                        
                        $requestData['profile_image'] = "/public/profile_pictures/".$randomDigit.'/'.$name;

                    } catch (Exception $e) {
                    
                        return redirect()->back()
                            ->withErrors($e->getMessage());    
                    }
                }
                 //dd($requestData);
                $user = User::create($requestData);

                return Redirect::to('admin/users-list')->withMessage("User Created Successfully."); 
            
            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }
        }

    }

    public function updateUser(Request $request){

        if($request->isMethod('post')){

            try{

                $userId = $request->input('id');

                $user = User::query()->where('id', $userId)->first();

                $requestData = $request->all();

                
                
                if ($request->hasFile('profile_image')) {

                    try {

                        $profile_image = $request->file('profile_image');

                        $name = str_replace(' ', '', $profile_image->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/profile_pictures/' . $user->id . '/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $profile_image->move($destinationFolder, $name);
                        
                        $requestData['profile_image'] = "/public/profile_pictures/".$user->id.'/'.$name;

                    } catch (Exception $e) {
                    
                        return redirect()->back()
                            ->withErrors($e->getMessage());    
                    }
                }

                $user->update($requestData);

                return Redirect::to('admin/users-list')->withMessage("User Updated Successfully."); 
            
            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }
        }

    }

    public function deleteUser($id){

        $user = User::findOrfail($id);
        $user->delete();

        $message = "User Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
   
}