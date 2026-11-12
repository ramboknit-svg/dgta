<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use Exception;
class NewsController extends Controller
{

   public function index(){
      
      $news = News::query()->orderBy('id', 'DESC')->get();
  
        return view('admin.news.news_list')->with('news',$news);

    }

    public function addNewsView(){
              
        return view('admin.news.add_news');     
    

    }

    public function editNews(Request $request, $id){
         
        try {

            $news = News::findOrfail($id);
            
            return view('admin.news.update_news')->with('news',$news);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addNews(AddNewsRequest $request){


        if($request->isMethod('post')){
           
           try{

              $news = new News;
              $news->name = $request->input('name');
              $news->link = $request->input('link');
              $news->status = $request->input('status');
              
             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/news/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $news->image = "/public/images/news/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
              
                $news->save();
                return Redirect::to('admin/news_list')->withMessage("Milestones Added Successfully.");

            }catch(\Exception $e){
                 dd($e->getMessage());

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
        
    }


    public function updateNews(UpdateNewsRequest $request){

        if($request->isMethod('post')){
        
            try{

                $newsId = $request->input('id');

                $news = News::query()->where('id', $newsId)->first();
                
                $news->name = $request->input('name');
                $news->link = $request->input('link');
                $news->status = $request->input('status');

             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/news/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $news->image = "/public/images/news/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }
               
               
                $news->save();

                return Redirect::to('admin/news_list')->withMessage("Milestones Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteNews($id){


        $getNews = News::query()->where('id', $id)->first();
         
        if(file_exists(public_path('/news').$getNews->image)){

            unlink(public_path('/news').$getNews->image);
        }

        $getNews->delete();

        $message = "Milestones Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
