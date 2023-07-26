<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $basket = Session::get('basket', []);
        return view('front.order.index', compact('basket'));
    }

    public function sale()
    {
        $basket = Session::get('basket', []);
        return view('front.order.sale', compact('basket'));
    }

    public function buy()
    {
        $basket = Session::get('basket', []);

        if (!count($basket)) {
            toastr('Məhsulu almaq üçün səbətə əlavə edin', 'warning');
            return redirect()->back();
        }
        $order = Order::create([
            'user_id' => auth()->user()?->id,
            'total' => 0,
            'datetime' => now(),
        ]);
        foreach ($basket as $item) {
            OrderProduct::create([
                'product_name' => $item['name'],
                'product_price' => $item['price'],
                'count' => $item['count'],
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
            ]);
            $order->total += $item['price'] * $item['count'];
            $order->save();
        }
        Session::forget('basket');
        toastr('Məhsul satışı həyata keçirilmişdir.');
        return redirect()->route('home');
    }
}
