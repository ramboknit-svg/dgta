<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddHodRequest;
use App\Http\Requests\UpdateHodRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Hod;
use Exception;
class HODController extends Controller
{

   public function index(){

      $hods = Hod::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.hod.hod_list')->with('hods',$hods);

    }

    public function addHodView(){
              
        return view('admin.hod.add_hod');     
    

    }

    public function editHod(Request $request, $id){
         
        try {

            $hod = Hod::findOrfail($id);
          
            return view('admin.hod.update_hod')->with('hod',$hod);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addHod(AddHodRequest $request){


        if($request->isMethod('post')){
           
           try{

              $hod = new Hod;
              $hod->name = $request->input('name');
              $hod->designation = $request->input('designation');
              $hod->description = $request->input('description');
              $hod->status = $request->input('status');
               
              
              
             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/hod/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->image = "/public/images/hod/" . $name;


                    } catch (Exception $e) {
                             // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                // dd($hod);
                $hod->save();

                return Redirect::to('admin/hod_list')->withMessage("HOD Added Successfully.");

            }catch(\Exception $e){
// dd($e->getMessage());
                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateHod(UpdateHodRequest $request){

        if($request->isMethod('post')){

        
            try{

                $hodId = $request->input('id');
                $hod = Hod::query()->where('id', $hodId)->first();
                
                $hod->name = $request->input('name');
                $hod->designation = $request->input('designation');
                $hod->description = $request->input('description');
                $hod->status = $request->input('status');

             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/hod/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->image = "/public/images/hod/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }
               

                $hod->save();

                return Redirect::to('admin/hod_list')->withMessage("DGTA Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteHod($id){


        $getHod = Hod::query()->where('id', $id)->first();
         
        if(file_exists(public_path('/hod').$getHod->image)){

            unlink(public_path('/hod').$getHod->image);
        }

        $getHod->delete();

        $message = "Dgta Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}

