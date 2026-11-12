<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\Http\Requests\AddGateRequest;
use App\Http\Requests\UpdateGateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GateController extends Controller
{
    public function index(){
        $gates = Gate::with('parent')->orderBy('id', 'DESC')->get();

        return view('admin.gate.index',compact('gates'));

    }

    public function addGateForm(){

         $parents = Gate::where('category_id',null)->get();

        return view('admin.gate.add',compact('parents'));

    }



    public function getGate(Request $request, $id)
    {
        try {
            $parents = Gate::where('id', '!=', $id)->get();
            $gate = Gate::query()->where(['id' => $id])->first();
            return view('admin.gate.update',compact('gate','parents'));
        
        }catch(Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }
    }

    public function addGate(AddGateRequest $request){
          
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
       
        $exists = Gate::where('category_id', $data['category_id'])
            ->where('name', $request->name)
            ->first();

        if ($exists) {
            return redirect()->back()
                ->withErrors(['name' => 'Name already exists in this category.'])
                ->withInput();
        }
        if($request->isMethod('post')){

            try{
                Gate::create($data);

                return Redirect::to('admin/gate_list')->withMessage("Created Successfully."); 
            
            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }
        }

    }

    public function updateGate(UpdateGateRequest $request){

        if($request->isMethod('post')){

            try{

                $userId = $request->input('id');

                $user = Gate::query()->where('id', $userId)->first();

                $requestData = $request->all();

                $user->update($requestData);

                return Redirect::to('admin/gate_list')->withMessage("Updated Successfully."); 
            
            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }
        }

    }

    public function deleteGate($id){

        $user = Gate::findOrfail($id);
        $user->delete();

        $message = "Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
   public function getSubGateCategory(Request $request)
    { 
       
        $subCategory = Gate::where('category_id', $request->category_id)->get();
        
        return response()->json($subCategory);
    }
   
}
