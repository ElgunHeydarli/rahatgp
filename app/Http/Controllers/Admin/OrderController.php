<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.detail', compact('order'));
    }

    public function change_status($id, Request $request)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status,
        ]);
        toastr('Sifarişin statusu dəyişdirilmişdir');
        return redirect()->back();
    }
}
