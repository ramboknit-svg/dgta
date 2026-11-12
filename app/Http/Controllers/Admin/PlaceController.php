<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddPlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Place;
use Exception;
class PlaceController extends Controller
{

   public function index(){

      $places = Place::query()->orderBy('id', 'DESC')->get();
    
    
        return view('admin.place.place_list')->with('places',$places);

    }

    public function addPlaceView(){
              
        return view('admin.place.add_place');     
    

    }

    public function editPlace(Request $request, $id){
         
        try {

            $place = Place::findOrfail($id);
          
            return view('admin.place.update_place')->with('place',$place);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addPlace(AddPlaceRequest $request){


        if($request->isMethod('post')){
           
           try{

              $place = new Place;
              $place->name = $request->input('name');
              $place->link = $request->input('link');
              $place->status = $request->input('status');
              // dd($banner);
              
              
             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/place/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $place->image = "/public/images/place/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                $place->save();

                return Redirect::to('admin/place_list')->withMessage("Place Added Successfully.");

            }catch(\Exception $e){
                 dd($e->getMessage());

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updatePlace(UpdatePlaceRequest $request){

        if($request->isMethod('post')){
        
            try{

                $placeId = $request->input('id');

                $place = Place::query()->where('id', $placeId)->first();

                $place->name = $request->input('name');
               
                $place->status = $request->input('status');

             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/place/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $place->image = "/public/images/place/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }

                $place->save();

                return Redirect::to('admin/place_list')->withMessage("Place Updated Successfully.");
            

            }catch(Exception $e){
                    dd($e->getMessage());
                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteplace($id){


        $getPlace = Place::query()->where('id', $id)->first();
         
        if(file_exists(public_path('/place').$getPlace->image)){

            unlink(public_path('/place').$getPlace->image);
        }

        $getPlace->delete();

        $message = "Place Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
