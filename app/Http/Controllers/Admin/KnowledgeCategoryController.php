<?php

namespace App\Http\Controllers\Admin;

use App\Models\KnowledgeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class KnowledgeCategoryController extends Controller
{
    public function index(){
    

    
       $categories = KnowledgeCategory::with('parent')->orderBy('id', 'DESC')->get();
    
        return view('admin.knowledge_category.index',compact('categories'));

    }

    public function addKnowledgeCategoryForm(){

         $parents = KnowledgeCategory::where('category_id',null)->get();

        return view('admin.knowledge_category.add',compact('parents'));

    }

    public function getKnowledgeCategory(Request $request, $id)
    {
        try {
            $parents = KnowledgeCategory::where('id', '!=', $id)->get();
            $knowledgeCategory = KnowledgeCategory::query()->where(['id' => $id])->first();
            return view('admin.knowledge_category.update',compact('knowledgeCategory','parents'));
        
        }catch(Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }
    }

    public function addKnowledgeCategory(AddCategoryRequest $request){
          
        // $rules = array(
        //     'name' => 'required',
        //     'description' => 'required'
        // );

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator);
        // }
        $requestData = $request->all();
              
                     // ✅ Final Category Selection Logic
                 $finalCategoryId = $request->sub_sub_category_id
                ?? $request->sub_category_id
                ?? $request->category_id;

            // ✅ Prepare Data
            $data = [
                'category_id' => $finalCategoryId,
                'name' => $request->name,
                'description' => $request->description,
            ];
       
        $exists = KnowledgeCategory::where('category_id', $data['category_id'])
            ->where('name', $request->name)
            ->first();
        //dd($exists);
if ($exists) {
    return redirect()->back()
        ->withErrors(['name' => 'Name already exists in this category.'])
        ->withInput();
}
        if($request->isMethod('post')){

            try{

                
               
                KnowledgeCategory::create($data);

                return Redirect::to('admin/knowledge_category_list')->withMessage("Created Successfully."); 
            
            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }
        }

    }

    public function updateKnowledgeCategory(UpdateCategoryRequest $request){

        if($request->isMethod('post')){

            try{

                $userId = $request->input('id');

                $user = KnowledgeCategory::query()->where('id', $userId)->first();

                $requestData = $request->all();

                
                
              

                $user->update($requestData);

                return Redirect::to('admin/knowledge_category_list')->withMessage("Updated Successfully."); 
            
            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }
        }

    }

    public function deleteKnowledgeCategory($id){

        $user = KnowledgeCategory::findOrfail($id);
        $user->delete();

        $message = "Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
  
   
}
