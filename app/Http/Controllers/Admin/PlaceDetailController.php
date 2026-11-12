<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Hod;
use App\Models\Place;
use App\Models\PlaceDetail;
use Exception;
class PlaceDetailController extends Controller
{

   public function index(){

      $hods = PlaceDetail::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.place_detail.index')->with('hods',$hods);

    }

    public function addPlaceDetailView(){
    
         $sections = Place::query()->orderBy('id', 'DESC')->get();     
        return view('admin.place_detail.add')->with('sections', $sections);;     
    

    }

    public function editPlaceDetail(Request $request, $id){
         
        try {

            $hod = PlaceDetail::findOrfail($id);
            $sections = Place::query()->orderBy('id', 'DESC')->get(); 
           
            return view('admin.place_detail.update')->with('hod',$hod)->with('sections',$sections);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addPlaceDetail(Request $request){


        if($request->isMethod('post')){
           
           try{
                    
                
                $hod= new PlaceDetail;
                $hod->place_id = $request->input('place_id');
                $hod->description = $request->input('description');
                $hod->history = $request->input('history');
                
                 if ($request->hasFile('gallery')) {

                    try {

                        $thumbnail = $request->file('gallery');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/gallery');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->gallery = "/public/images/gallery/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                 if ($request->hasFile('link1')) {

                    try {

                        $thumbnail = $request->file('link1');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/link1/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->link1 = "/public/images/link1/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                 if ($request->hasFile('link2')) {

                    try {

                        $thumbnail = $request->file('link2');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/link2/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->link2 = "/public/images/link2/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                
                
                 
                $hod->save();

                return Redirect::to('admin/place_detail_list')->withMessage("Place Detail Added Successfully.");

            }catch(\Exception $e){
                dd($e->getMessage());
                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updatePlaceDetail(Request $request){

        if($request->isMethod('post')){
        
            try{

                $hodId = $request->input('id');
                $hod = PlaceDetail::query()->where('id', $hodId)->first();
                
                $hod->place_id = $request->input('place_id');
                $hod->description = $request->input('description');
                $hod->history = $request->input('history');
                
                 if ($request->hasFile('gallery')) {

                    try {

                        $thumbnail = $request->file('gallery');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/gallery');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->gallery = "/public/images/gallery/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                 if ($request->hasFile('link1')) {

                    try {

                        $thumbnail = $request->file('link1');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/link1/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->link1 = "/public/images/link1/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                 if ($request->hasFile('link2')) {

                    try {

                        $thumbnail = $request->file('link2');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/link2/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $hod->link2 = "/public/images/link2/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                
                

                $hod->save();

                return Redirect::to('admin/place_detail_list')->withMessage("Place detail Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deletePlaceDetail($id){


        $getHod = PlaceDetail::query()->where('id', $id)->first();
        $getHod->delete();

        $message = "Place Detail Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
