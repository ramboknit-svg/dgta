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
use Exception;
class BranchController extends Controller
{

   public function index(){

      $hods = Branch::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.branch.index')->with('hods',$hods);

    }

    public function addBranchView(){
              
        return view('admin.branch.add');     
    

    }

    public function editBranch(Request $request, $id){
         
        try {

            $hod = Branch::findOrfail($id);
         
            return view('admin.branch.update')->with('hod',$hod);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

   public function addBranch(AddBranchRequest $request)
{
    if($request->isMethod('post')){

        try {
            // Create branch without image first
            $branch = Branch::create($request->except('image'));

            // Image upload
            if ($request->hasFile('image')) {

                $thumbnail = $request->file('image');

                $name = time() . str_replace(' ', '', $thumbnail->getClientOriginalName());
                $destinationFolder = public_path('/images/branch/');

                // Delete file if exists
                if (file_exists($destinationFolder . $name)) {
                    unlink($destinationFolder . $name);
                }

                // Move file
                $thumbnail->move($destinationFolder, $name);

                // Save image path to DB
                $branch->image = "/public/images/branch/" . $name;
                $branch->save();
            }

            return Redirect::to('admin/branch_list')->withMessage("Branch Added Successfully.");

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}



    public function updateBranch(UpdateBranchRequest $request){

        if($request->isMethod('post')){
        
            try{

                $hodId = $request->input('id');
                $hod = Branch::query()->where('id', $hodId)->first();
                
                $hod->name = $request->input('name');
                $hod->role = $request->input('role');
                $hod->duty = $request->input('duty');
                $hod->description = $request->input('description');

                $hod->head_name = $request->input('head_name');
                $hod->policy = $request->input('policy');
                $hod->designation = $request->input('designation');

                  if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                      
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/branch/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->image = "/public/images/branch/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                

                $hod->save();

                return Redirect::to('admin/branch_list')->withMessage("Branch Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteBranch($id){


        $getHod = Branch::query()->where('id', $id)->first();
        $getHod->delete();

        $message = "Branch Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
