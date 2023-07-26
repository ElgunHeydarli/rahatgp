<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function basket()
    {
        $basket = Session::get('basket', []);
        return view('front.basket', compact('basket'));
    }

    public function favorite()
    {
        $favorite = Session::get('favorite', []);
        return view('front.favorite',compact('favorite'));

    }
}
