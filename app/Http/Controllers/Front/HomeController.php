<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function search(Request $request)
    {
        $search = urlencode($request->search);
        $phone = env('SEND_PHONE');
        $redirect_url = "https://wa.me/$phone?text=$search";

        return redirect($redirect_url);
    }
}
