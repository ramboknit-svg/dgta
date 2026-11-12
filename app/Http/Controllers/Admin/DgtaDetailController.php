<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\UpdateDgtaRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Hod;
use Exception;
class DgtaDetailController extends Controller
{


   public function index(){

      $hods = Hod::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.dgta_detail.hod_list')->with('hods',$hods);

    }

   

    public function editHod(Request $request, $id){
         
        try {
           
            $hod = Hod::findOrfail($id);
          
            return view('admin.dgta_detail.update_hod')->with('hod',$hod);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

  

    public function updateHod(UpdateDgtaRequest $request){

        if($request->isMethod('post')){

       
            try{

                $hodId = $request->input('id');
                $hod = Hod::query()->where('id', $hodId)->first();
                $hod->long_description = $request->input('long_description');
                
             
                if ($request->hasFile('left_image')) {

                    try {

                        $thumbnail = $request->file('left_image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/hod/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->left_image = "/public/images/hod/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }
                 if ($request->hasFile('right_image')) {

                    try {

                        $thumbnail = $request->file('right_image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/hod/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->right_image = "/public/images/hod/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }

                $hod->save();

                return Redirect::to('admin/dgta_list')->withMessage("Dgta Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

}

