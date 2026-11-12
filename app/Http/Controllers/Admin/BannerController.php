<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;
use Exception;
class BannerController extends Controller
{

   public function index(){

      $banners = Banner::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.banner.banner_list')->with('banners',$banners);

    }

    public function addBannerView(){
              
        return view('admin.banner.add_banner');     
    

    }

    public function editBanner(Request $request, $id){
         
        try {

            $banner = Banner::findOrfail($id);
          
            return view('admin.banner.update_banner')->with('banner',$banner);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addBanner(AddBannerRequest $request){


        if($request->isMethod('post')){
           
           try{

              $banner = new Banner;
              // $banner->title = $request->input('title');
              $banner->description = $request->input('description');
              $banner->status = $request->input('status');
              // dd($banner);
              
              
             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/banner/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $banner->image = "/public/images/banner/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                // dd($banner);
                $banner->save();
                // dd($banner);

                return Redirect::to('admin/banner_list')->withMessage("Banner Added Successfully.");

            }catch(\Exception $e){
                // dd($e->getMessage());

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateBanner(UpdateBannerRequest $request){

        if($request->isMethod('post')){
        
            try{

                $bannerId = $request->input('id');

                $banner = Banner::query()->where('id', $bannerId)->first();
                
                // $banner->title = $request->input('title');
                $banner->description = $request->input('description');
                $banner->status = $request->input('status');

             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/banner/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $banner->image = "/public/images/banner/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }

                $banner->save();

                return Redirect::to('admin/banner_list')->withMessage("Banner Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteBanner($id){


        $getBanner = Banner::query()->where('id', $id)->first();
         
        if(file_exists(public_path('/banner').$getBanner->image)){

            unlink(public_path('/banner').$getBanner->image);
        }

        $getBanner->delete();

        $message = "Banner Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
