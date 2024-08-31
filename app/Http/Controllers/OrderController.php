<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // عرض الطلبات
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    // إنشاء طلب جديد
    public function create()
    {
        return view('orders.create');
    }

    // حفظ الطلب الجديد
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        Order::create([
            'user_id' => auth()->id(),
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }
}
