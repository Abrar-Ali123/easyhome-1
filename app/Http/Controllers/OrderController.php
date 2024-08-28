<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // عرض جميع الطلبات
    public function index()
    {
        $orders = Order::with('user', 'product')->get();

        return view('orders.index', compact('orders'));
    }

    // إنشاء طلب جديد
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->product_id = $request->product_id;
        $order->save();

        return redirect()->route('orders.index');
    }

    // عرض طلب محدد
    public function show($id)
    {
        $order = Order::with('user', 'product')->findOrFail($id);

        return view('orders.show', compact('order'));
    }
}
