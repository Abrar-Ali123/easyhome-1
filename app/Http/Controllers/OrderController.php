<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // إنشاء طلب جديد
    public function store(Request $request, Product $product)
    {
        // التحقق من المستخدم
        if (! auth()->check()) {
            return response()->json(['auth_required' => true], 401);
        }

        // معالجة طلب المنتج
        $order = new Order();
        $order->product_id = $product->id;
        $order->user_id = auth()->id();
        $order->save();

        return response()->json(['message' => 'Product ordered successfully']);
    }
}
