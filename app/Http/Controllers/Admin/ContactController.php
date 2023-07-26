<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::find(1);
        return view('admin.contact.index',compact('contact'));
    }


    public function update(ContactRequest $request){
        $contact = Contact::find(1);
        $validated = $request->validated();
        $contact->update($validated);
        return redirect()->back()->with('success','Məlumatlar uğurla yeniləndi');
    }


}
