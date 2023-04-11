<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function index(){
        $contact = Contact::all();
        return view('admin.contact.index',compact('contact'));
    }

    public function store(Request $request){
        $contact = new Contact();
        $contact->c_fname=$request->c_fname;
        $contact->c_lname=$request->c_lname;
        $contact->c_email=$request->c_email;
        $contact->c_subject=$request->c_subject;
        $contact->c_message=$request->c_message;
        $contact->save();
        return redirect()->route('front.contact');
    }

}
