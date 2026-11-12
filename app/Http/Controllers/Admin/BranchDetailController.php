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
use App\Models\BranchDetail;
use Exception;
class BranchDetailController extends Controller
{

   public function index(){

      $hods = BranchDetail::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.branch_detail.index')->with('hods',$hods);

    }

    public function addBranchDetailView(){
    
         $sections = Branch::query()->orderBy('id', 'DESC')->get();     
        return view('admin.branch_detail.add')->with('sections', $sections);;     
    

    }

    public function editSectionDetail(Request $request, $id){
         
        try {

            $hod = BranchDetail::findOrfail($id);
            $sections = Branch::query()->orderBy('id', 'DESC')->get(); 
            return view('admin.branch_detail.update')->with('hod',$hod)->with('sections',$sections);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addBranchDetail(Request $request){


        if($request->isMethod('post')){
           
           try{
                    
             
                $hod= new BranchDetail;
                $hod->branch_id = $request->input('branch_id');
                $hod->watch_title = $request->input('watch_title');
                $hod->new_title = $request->input('new_title');
                
                 if ($request->hasFile('watch_image')) {

                    try {

                        $thumbnail = $request->file('watch_image');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/watch_image/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->watch_image = "/public/images/watch_image/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                 if ($request->hasFile('new_image')) {

                    try {

                        $thumbnail = $request->file('new_image');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/new_image/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->new_image = "/public/images/new_image/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                

                $hod->save();

                return Redirect::to('admin/branch_detail_list')->withMessage("Branch Detail Added Successfully.");

            }catch(\Exception $e){
                dd($e->getMessage());
                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateBranchDetail(Request $request){

        if($request->isMethod('post')){
        
            try{

                $hodId = $request->input('id');
                $hod = BranchDetail::query()->where('id', $hodId)->first();
                
                $hod->branch_id = $request->input('branch_id');
                $hod->watch_title = $request->input('watch_title');
                $hod->new_title = $request->input('new_title');
                
                if ($request->hasFile('watch_image')) {

                    try {

                        $thumbnail = $request->file('watch_image');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/whatch_image/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->watch_image = "/public/images/watch_image/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                 if ($request->hasFile('new_image')) {

                    try {

                        $thumbnail = $request->file('new_image');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/new_image/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->new_image = "/public/images/new_image/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                

                $hod->save();

                return Redirect::to('admin/section_detail_list')->withMessage("Branch detail Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteBranchDetail($id){


        $getHod = BranchDetail::query()->where('id', $id)->first();
        $getHod->delete();

        $message = "Branch Detail Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
