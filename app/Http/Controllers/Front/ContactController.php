<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function contact(){
       $contact = Contact::find(1);
       return view('front.contact',compact('contact'));
   }
}
