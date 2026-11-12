<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddNewRequest;
use App\Http\Requests\UpdateNewRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\WhatsNew;
use Exception;
class NewController extends Controller
{

   public function index(){

      $news = WhatsNew::query()->orderBy('id', 'DESC')->get();
    
        return view('admin.new.news_list')->with('news',$news);

    }

    public function addNewView(){
              
        return view('admin.new.add_news');     
    

    }

    public function editNew(Request $request, $id){
         
        try {

            $news = WhatsNew::findOrfail($id);
          
            return view('admin.new.update_news')->with('news',$news);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addNew(AddNewRequest $request){


        if($request->isMethod('post')){
           
           try{

              $news = new WhatsNew;
              $news->name = $request->input('name');
              
              $news->status = $request->input('status');
              
             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/new/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $news->image = "/public/images/new/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                $news->save();
                return Redirect::to('admin/new_list')->withMessage("New Added Successfully.");

            }catch(\Exception $e){
                // dd($e->getMessage());

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateNew(UpdateNewRequest $request){

        if($request->isMethod('post')){
        
            try{

                $newsId = $request->input('id');

                $news = WhatsNew::query()->where('id', $newsId)->first();
                
                $news->name = $request->input('name');
                
                $news->status = $request->input('status');

             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/new/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $news->image = "/public/images/new/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }

                $news->save();

                return Redirect::to('admin/new_list')->withMessage("New Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteNew($id){


        $getNews = WhatsNew::query()->where('id', $id)->first();
         
        if(file_exists(public_path('/new').$getNews->image)){

            unlink(public_path('/new').$getNews->image);
        }

        $getNews->delete();

        $message = "New Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
