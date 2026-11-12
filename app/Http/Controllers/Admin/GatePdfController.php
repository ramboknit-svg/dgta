<?php

namespace App\Http\Controllers\Admin;

use App\Models\GatePdf;
use App\Models\Gate;
use App\Http\Requests\AddGatePdfRequest;
use App\Http\Requests\UpdateGatePdfRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Redirect;


class GatePdfController extends Controller
{
    public function index(){
        $categories = GatePdf::orderBy('id', 'DESC')->get();
        return view('admin.gate_pdf.index',compact('categories'));
    }

    public function addGatePdfForm(){
        $sections = Gate::where('category_id')->orderBy('id', 'DESC')->get();
        return view('admin.gate_pdf.add',compact('sections'));
    }

    public function getGatePdf(Request $request, $id)
    {
        try {
           $sections = Gate::orderBy('id', 'DESC')->get();
            $knowledgeCategory = GatePdf::query()->where(['id' => $id])->first();
            return view('admin.gate_pdf.update',compact('knowledgeCategory','sections'));
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());

        }
    }

    public function addGatePdf(AddGatePdfRequest $request){
        if($request->isMethod('post')){
            try{
                $finalCategoryId = $request->sub_sub_sub_gate_id
                    ?? $request->sub_sub_gate_id
                    ?? $request->sub_gate_id
                    ?? $request->gate_id;

                $data = [
                    'gate_id' => $finalCategoryId,
                    'name' => $request->name,
                    'link' => $request->link,
                ];

                $fp_cell = GatePdf::create($data);

                if ($request->hasFile('link')) {

                    $thumbnail = $request->file('link');

                    $name = time() . str_replace(' ', '', $thumbnail->getClientOriginalName());
                    $destinationFolder = public_path('/images/gate_pdf/');

                    if (!file_exists($destinationFolder)) {
                        mkdir($destinationFolder, 0755, true);
                    }

                    if (file_exists($destinationFolder . $name)) {
                        unlink($destinationFolder . $name);
                    }

                    $thumbnail->move($destinationFolder, $name);

                    $fp_cell->link = "/public/images/gate_pdf/" . $name;
                    $fp_cell->save();
                }

                return Redirect::to('admin/gate_pdf_list')->withMessage("Created Successfully."); 
            }catch(Exception $e){
                return redirect()->back()->withErrors($e->getMessage());
            }
        }

    }

    public function updateGatePdf(UpdateGatePdfRequest $request){
        if($request->isMethod('post')){
            try{
                $userId = $request->input('id');
                $user = GatePdf::query()->where('id', $userId)->first();

                $requestData = $request->all();
                 if ($request->hasFile('link')) {

                    try {

                        $thumbnail = $request->file('link');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/gate_pdf/');

                        if (!file_exists($destinationFolder)) {
                            mkdir($destinationFolder, 0755, true);
                        }

                        if(file_exists($destinationFolder.$name)){
                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $requestData['link'] = "/public/images/gate_pdf/" . $name;

                    } catch (Exception $e) {
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }

                $user->update($requestData);

                return Redirect::to('admin/gate_pdf_list')->withMessage("Updated Successfully."); 
            }catch(Exception $e){
                return redirect()->back()->withErrors($e->getMessage());
            }
        }

    }

    public function deleteGatePdf($id){
        $user = GatePdf::findOrfail($id);
        $user->delete();

        $message = "Data Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }

}
