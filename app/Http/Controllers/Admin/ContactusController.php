<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $contact = ContactUs::all();
       
        return view('admin.contact.contact_list')->withContact($contact);
    }
    public function viewContact(Request $request, $id){

        try {
            
            $contacts = ContactUs::findOrfail($id);
            
            return view('admin.contact.view_contact')
                        ->withContacts($contacts);

        }catch(\Exception $e){

            return redirect()->back()
                    ->withErrors($e->getMessage());

        }                

    }
    public function deleteContact($id){

        $page = ContactUs::findOrfail($id);
        $page->delete();

        $message = "Contact Us Deleted Successfully!";
        return redirect()->back()->withMessage($message);

    }
}
