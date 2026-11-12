<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Application;
use Exception;
class ApplicationController extends Controller
{

   public function index(){

      $applications = Application::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.application.application_list')->with('applications',$applications);

    }

    public function addApplicationView(){
              
        return view('admin.application.add_application');     
    

    }

    public function editApplication(Request $request, $id){
         
        try {

            $application = Application::findOrfail($id);
          
            return view('admin.application.update_application')->with('application',$application);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addApplication(AddApplicationRequest $request){


        if($request->isMethod('post')){
           
           try{

              $application = new Application;
              $application->name = $request->input('name');
              $application->link = $request->input('link');
              $application->status = $request->input('status');
              
             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/application/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $application->image = "/public/images/application/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                $application->save();
                return Redirect::to('admin/application_list')->withMessage("Application Added Successfully.");

            }catch(\Exception $e){
                // dd($e->getMessage());

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateApplication(UpdateApplicationRequest $request){

        if($request->isMethod('post')){
        
            try{

                $applicationId = $request->input('id');

                $application = Application::query()->where('id', $applicationId)->first();
                
                $application->name = $request->input('name');
                $application->link = $request->input('link');
                $application->status = $request->input('status');

             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/application/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $application->image = "/public/images/application/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }

                $application->save();

                return Redirect::to('admin/application_list')->withMessage("Application Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteApplication($id){


        $getApplication = Application::query()->where('id', $id)->first();
         
        if(file_exists(public_path('/application').$getApplication->image)){

            unlink(public_path('/application').$getApplication->image);
        }

        $getApplication->delete();

        $message = "Application Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
