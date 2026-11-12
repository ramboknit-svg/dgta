<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddKnowledgeRequest;
use App\Http\Requests\UpdateKnowledgeRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Knowledge;
use Exception;
class KnowledgeController extends Controller
{

   public function index(){

      $knows = Knowledge::query()->orderBy('id', 'DESC')->get();

      
    
        return view('admin.knowledge.knowledge_list',compact('knows'));

    }

    public function addKnowledgeView(){
              
        return view('admin.knowledge.add_knowledge');     
    

    }

    public function editKnowledge(Request $request, $id){
         
        try {

            $know = Knowledge::findOrfail($id);
          
            return view('admin.knowledge.update_knowledge',compact('know'));

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }

    public function addKnowledge(AddKnowledgeRequest $request){


        if($request->isMethod('post')){
           
           try{

              $know = new Knowledge;
              
              $know->link = $request->input('link');
              $know->status = $request->input('status');
              
             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/knowledge/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $know->image = "/public/images/knowledge/" . $name;


                    } catch (Exception $e) {
                            // dd($e->getMessage());
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
                $know->save();
                return Redirect::to('admin/knowledge_list')->withMessage("Knowledge Added Successfully.");

            }catch(\Exception $e){
                // dd($e->getMessage());

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }


    public function updateKnowledge(UpdateKnowledgeRequest $request){

        if($request->isMethod('post')){
        
            try{

                $knowId = $request->input('id');

                $know = Knowledge::query()->where('id', $knowId)->first();
                
                $know->link = $request->input('link');
                $know->status = $request->input('status');

             if ($request->hasFile('image')) {

                    try {

                        $thumbnail = $request->file('image');

                        // $name = $thumbnail->getClientOriginalName();
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/knowledge/');

                        // Delete folder
                        if(file_exists($destinationFolder.$name)){

                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $know->image = "/public/images/knowledge/" . $name;

                    } catch (\Exception $e) {                            
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }

                $know->save();

                return Redirect::to('admin/knowledge_list')->withMessage("News Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

    public function deleteKnowledge($id){


        $getknow = Knowledge::query()->where('id', $id)->first();
         
        if(file_exists(public_path('/knowledge').$getknow->image)){

            unlink(public_path('/knowledge').$getknow->image);
        }

        $getknow->delete();

        $message = "Knowledge Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
