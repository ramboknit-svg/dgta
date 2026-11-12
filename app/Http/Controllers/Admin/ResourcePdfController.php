<?php

namespace App\Http\Controllers\Admin;

use App\Models\ResourcePdf;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Http\Requests\AddResourcePdfRequest;
use App\Http\Requests\UpdateResourcePdfRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Redirect;


class ResourcePdfController extends Controller
{
    public function index(){
        $categories = ResourcePdf::orderBy('id', 'DESC')->get();
        return view('admin.resource_pdf.index',compact('categories'));
    }

    public function addResourcePdfForm(){
        $sections = Resource::where('category_id')->orderBy('id', 'DESC')->get();
        return view('admin.resource_pdf.add',compact('sections'));
    }

    public function getResourcePdf(Request $request, $id)
    {
        try {
           $sections = Resource::orderBy('id', 'DESC')->get();
            $knowledgeCategory = ResourcePdf::query()->where(['id' => $id])->first();
            return view('admin.resource_pdf.update',compact('knowledgeCategory','sections'));
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());

        }
    }

    public function addResourcePdf(AddResourcePdfRequest $request){
        if($request->isMethod('post')){
            try{
                $finalCategoryId = $request->sub_sub_sub_resource_id
                    ?? $request->sub_sub_resource_id
                    ?? $request->sub_resource_id
                    ?? $request->resource_id;

                $data = [
                    'resource_id' => $finalCategoryId,
                    'name' => $request->name,
                    'link' => $request->link,
                ];

                $fp_cell = ResourcePdf::create($data);

                if ($request->hasFile('link')) {

                    $thumbnail = $request->file('link');

                    $name = time() . str_replace(' ', '', $thumbnail->getClientOriginalName());
                    $destinationFolder = public_path('/images/resource_pdf/');

                    if (!file_exists($destinationFolder)) {
                        mkdir($destinationFolder, 0755, true);
                    }

                    if (file_exists($destinationFolder . $name)) {
                        unlink($destinationFolder . $name);
                    }

                    $thumbnail->move($destinationFolder, $name);

                    $fp_cell->link = "/public/images/resource_pdf/" . $name;
                    $fp_cell->save();
                }

                return Redirect::to('admin/resource_pdf_list')->withMessage("Created Successfully."); 
            }catch(Exception $e){
                return redirect()->back()->withErrors($e->getMessage());
            }
        }

    }

    public function updateResourcePdf(UpdateResourcePdfRequest $request){
        if($request->isMethod('post')){
            try{
                $userId = $request->input('id');
                $user = ResourcePdf::query()->where('id', $userId)->first();

                $requestData = $request->all();
                 if ($request->hasFile('link')) {

                    try {

                        $thumbnail = $request->file('link');
                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;

                        $destinationFolder = public_path('/images/resource_pdf/');

                        if (!file_exists($destinationFolder)) {
                            mkdir($destinationFolder, 0755, true);
                        }

                        if(file_exists($destinationFolder.$name)){
                            unlink($destinationFolder.$name);
                        }

                        $thumbnail->move($destinationFolder, $name);

                        $requestData['link'] = "/public/images/resource_pdf/" . $name;

                    } catch (Exception $e) {
                        return redirect()->back()->withErrors($e->getMessage());
                    }
                }

                $user->update($requestData);

                return Redirect::to('admin/resource_pdf_list')->withMessage("Updated Successfully."); 
            }catch(Exception $e){
                return redirect()->back()->withErrors($e->getMessage());
            }
        }

    }

    public function deleteResourcePdf($id){
        $user = ResourcePdf::findOrfail($id);
        $user->delete();

        $message = "Data Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }

}
