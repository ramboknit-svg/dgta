<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{


	public function index(Request $request)
	{

		$validation = Validator::make($request->all(), [
			'search'    => 'required'
		]);

		if ($validation->fails()) {

			return redirect()->back()
				->withErrors($validation);
		}

		else{

			$searchRequest = $request->input('search');

			$users = User::query()
					->where('type', '=', 2)
					->where('is_admin', '=', 0)
                    ->where('first_name', 'LIKE', "%$searchRequest%")
                    ->orWhere('address',  'LIKE', "%$searchRequest%")
                    ->orWhere('email',  'LIKE', "%$searchRequest%")
					->get();

            return view('admin.user.user_list')->withUsers($users);

		}


	}
	public function getsite(Request $request)
    {
       
        try {
            
            $site = SiteSetting::first();
            return view('admin.site.update_site')->with('site',$site);
        
        }catch(Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }
    }
     public function updateSite(Request $request){

        if($request->isMethod('post')){
        
            try{


                 $site = SiteSetting::first();
                 $site->title = $request->input('title');
                 $site->email = $request->input('email');

                 if ($request->File('image')) {
               
                    try {

                        $thumbnail = $request->file('image');

                        $name = str_replace(' ', '', $thumbnail->getClientOriginalName());
                        $name = time().$name;
                        $destinationFolder = public_path('/images/site/');

                        $thumbnail->move($destinationFolder, $name);

                        $site->image = "/public/images/site/" . $name;
                       

                    } catch (\Exception $e) {
                            
                        return redirect()->back()
                                ->withErrors($e->getMessage());
                    }
                }
               
             

                $site->save();

                return Redirect::to('admin/site')->withMessage("Site Setting Updated Successfully.");
            

            }catch(Exception $e){

                return redirect()->back()
                    ->withErrors($e->getMessage());
            
            }
        }
        

    }

  

}
