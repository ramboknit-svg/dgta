<?php

namespace App\Http\Controllers\Admin;

use App\Models\TelDir;
use App\Models\Award;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAwardRequest;
use App\Http\Requests\AddAwardRequest;
use Exception;
use Illuminate\Support\Facades\Redirect;

class AwardController extends Controller
{
    public function index()
    {
        $items = Award::orderBy('id', 'DESC')->get();
        return view('admin.award.index', compact('items'));
    }
      public function addAwardView(){
              
        return view('admin.award.add');     
    

    }

    public function getAward(Request $request, $id)
    {
        try {
            $item = Award::query()->where(['id' => $id])->first();
            return view('admin.award.update', compact('item'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
   public function addAward(AddAwardRequest $request){


        if($request->isMethod('post')){
           
           try{

              $banner = new Award;
              $banner->name = $request->input('name');
              $banner->appointment = $request->input('appointment');
            
              
           
                $banner->save();
               

                return Redirect::to('admin/award_list')->withMessage("Award Added Successfully.");

            }catch(\Exception $e){
                // dd($e->getMessage());

                return redirect()->back()
                    ->withErrors($e->getMessage());
            }

        }
        
    }
    public function updateAward(UpdateAwardRequest $request)
    {
        if ($request->isMethod('post')) {
            try {
                $id = $request->input('id');
                $item = Award::query()->where('id', $id)->first();
                $requestData = $request->all();
                $item->update($requestData);
                return Redirect::to('admin/award_list')->withMessage('Updated Successfully.');
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
        }
    }

    public function deleteAward($id)
    {
        $item = Award::findOrfail($id);
        $item->delete();
        return redirect()->back()->withMessage('Deleted Successfully!');
    }
}
