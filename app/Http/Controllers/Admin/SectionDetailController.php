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
use App\Models\Section;
use App\Models\SectionDetail;
use Exception;
class SectionDetailController extends Controller
{

   public function index(){

      $hods = SectionDetail::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.section_detail.index')->with('hods',$hods);

    }

    public function addSectionDetailView(){
    
         $sections = Section::query()->orderBy('id', 'DESC')->get();     
        return view('admin.section_detail.add')->with('sections', $sections);;     
    

    }

    public function editSectionDetail(Request $request, $id){
         
        try {

            $hod = SectionDetail::findOrfail($id);
            $sections = Section::query()->orderBy('id', 'DESC')->get(); 
            return view('admin.section_detail.update')->with('hod',$hod)->with('sections',$sections);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addSectionDetail(Request $request){


        if($request->isMethod('post')){
           
           try{
                    
             
                $hod= new SectionDetail;
                $hod->section_id = $request->input('section_id');
                $hod->charter = $request->input('charter');
                $hod->updates = $request->input('updates');
                

                $hod->save();

                return Redirect::to('admin/section_detail_list')->withMessage("Section Detail Added Successfully.");

            }catch(\Exception $e){
                dd($e->getMessage());
                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateSectionDetail(Request $request){

        if($request->isMethod('post')){
        
            try{

                $hodId = $request->input('id');
                $hod = SectionDetail::query()->where('id', $hodId)->first();
                
                $hod->section_id = $request->input('section_id');
                $hod->charter = $request->input('charter');
                $hod->updates = $request->input('updates');
                

                $hod->save();

                return Redirect::to('admin/section_detail_list')->withMessage("Section detail Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteDetail($id){


        $getHod = SectionDetail::query()->where('id', $id)->first();
        $getHod->delete();

        $message = "Section Detail Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
