<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddPlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Place;
use App\Models\Section;
use Exception;
class SectionController extends Controller
{

   public function index(){

      $places = Section::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.section.place_list')->with('places',$places);

    }

    public function addSectionView(){
              
        return view('admin.section.add_place');     
    

    }

    public function editSection(Request $request, $id){
         
        try {

            $place = Section::findOrfail($id);
          
            return view('admin.section.update_place')->with('place',$place);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addSection(Request $request){


        if($request->isMethod('post')){
           
           try{

              $place = new Section;
              $place->name = $request->input('name');
              
            
                $place->save();

                return Redirect::to('admin/section_list')->withMessage("Section Added Successfully.");

            }catch(\Exception $e){
                 dd($e->getMessage());

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateSection(Request $request){

        if($request->isMethod('post')){
        
            try{

                $placeId = $request->input('id');

                $place = Section::query()->where('id', $placeId)->first();

                $place->name = $request->input('name');

                $place->save();

                return Redirect::to('admin/section_list')->withMessage("Section Updated Successfully.");
            

            }catch(Exception $e){
                    dd($e->getMessage());
                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deletesection($id){


        $getPlace = Section::query()->where('id', $id)->first();

        $getPlace->delete();

        $message = "Section Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
