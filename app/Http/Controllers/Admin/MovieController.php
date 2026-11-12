<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Moview;
use Exception;
class MovieController extends Controller
{

   public function index(){

      $banner = Moview::query()->orderBy('id', 'DESC')->first();
     
        return view('admin.movie.banner_list')->with('banner',$banner);

    }

    public function addMovieView(){
              
        return view('admin.movie.add_banner');     
    

    }

    public function editMovie(Request $request, $id){
         
        try {
           
            $banner = Moview::findOrfail($id);
            $days = Moview::query()->orderBy('id', 'DESC')->get();
             
            return view('admin.movie.update_banner')->with('banner',$banner)->with('days',$days);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addMovie(AddMovieRequest $request){


        if($request->isMethod('post')){
           
           try{

              $banner = new Moview;
              // $banner->title = $request->input('title');
              
              $banner->status = $request->input('status');
              // dd($banner);
              
              
             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/movie/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $banner->image = "/public/images/movie/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                // dd($banner);
                $banner->save();
                // dd($banner);

                return Redirect::to('admin/movie_list')->withMessage("Banner Added Successfully.");

            }catch(\Exception $e){
             dd($e->getMessage());

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateMovie(UpdateMovieRequest $request){

        if($request->isMethod('post')){
        
            try{
            
            
         
                $bannerId = $request->input('id');

                $banner = Moview::query()->where('id', $request->input('day'))->first();
                $moview_img = Moview::query()->where('id',7)->first();
                
               
                $banner->name = $request->input('name');
                
               

             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/movie/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $moview_img->image = "/public/images/movie/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }
               
                $banner->save();
                $moview_img->save();

                return Redirect::to('admin/movie_list')->withMessage("Movie Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    
}
