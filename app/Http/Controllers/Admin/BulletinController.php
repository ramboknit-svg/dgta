<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Hod;
use App\Models\Branch;
use App\Models\Bulletin;
use Exception;
class BulletinController extends Controller
{

   public function index(){

         $hods = Bulletin::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.bulletin.index')->with('hods',$hods);

    }

    public function addBulletinView(){
              
        return view('admin.bulletin.add');     
    

    }

    public function editBulletin(Request $request, $id){
         
        try {

            $hod = Bulletin::findOrfail($id);
         
            return view('admin.bulletin.update')->with('hod',$hod);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addBulletin(Request $request){


        if($request->isMethod('post')){
           
           try{
                    
            
                Bulletin::create($request->all());

                return Redirect::to('admin/bulletin_list')->withMessage("Bulletin Added Successfully.");

            }catch(\Exception $e){
               
                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateBulletin(Request $request){

        if($request->isMethod('post')){
        
            try{

                $hodId = $request->input('id');
                $hod = Bulletin::query()->where('id', $hodId)->first();
                
                $hod->name = $request->input('name');
                $hod->role = $request->input('role');
                $hod->duty = $request->input('duty');
                $hod->description = $request->input('description');
                

                $hod->save();

                return Redirect::to('admin/bulletin_list')->withMessage("Bulletin Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteBulletin($id){


        $getHod = Bulletin::query()->where('id', $id)->first();
        $getHod->delete();

        $message = "Bulletin Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
