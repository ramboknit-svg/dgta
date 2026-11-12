<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ResourceController extends Controller
{
    public function index(){
        $resources = Resource::with('parent')->orderBy('id', 'DESC')->get();

        return view('admin.resource.index',compact('resources'));

    }

    public function addResourceForm(){

         $parents = Resource::where('category_id',null)->get();

        return view('admin.resource.add',compact('parents'));

    }



    public function getResource(Request $request, $id)
    {
        try {
            $parents = Resource::where('id', '!=', $id)->get();
            $resource = Resource::query()->where(['id' => $id])->first();
            return view('admin.resource.update',compact('resource','parents'));
        
        }catch(Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }
    }

    public function addResource(AddResourceRequest $request){
          
        // $rules = array(
        //     'name' => 'required',
           
        // );

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator);
        // }
        $requestData = $request->all();
              
                $finalCategoryId = $request->sub_sub_category_id
                ?? $request->sub_category_id
                ?? $request->category_id;

            $data = [
                'category_id' => $finalCategoryId,
                'name' => $request->name,
               
            ];
       
        $exists = Resource::where('category_id', $data['category_id'])
            ->where('name', $request->name)
            ->first();

        if ($exists) {
            return redirect()->back()
                ->withErrors(['name' => 'Name already exists in this category.'])
                ->withInput();
        }
        if($request->isMethod('post')){

            try{
                Resource::create($data);

                return Redirect::to('admin/resources_list')->withMessage("Created Successfully."); 
            
            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }
        }

    }

    public function updateResource(UpdateResourceRequest $request){

        if($request->isMethod('post')){

            try{

                $userId = $request->input('id');

                $user = Resource::query()->where('id', $userId)->first();

                $requestData = $request->all();

                $user->update($requestData);

                return Redirect::to('admin/resources_list')->withMessage("Updated Successfully."); 
            
            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }
        }

    }

    public function deleteResource($id){

        $user = Resource::findOrfail($id);
        $user->delete();

        $message = "Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
   public function getSubResourceCategory(Request $request)
    { 
       
        $subCategory = Resource::where('category_id', $request->category_id)->get();
        
        return response()->json($subCategory);
    }
   
}
