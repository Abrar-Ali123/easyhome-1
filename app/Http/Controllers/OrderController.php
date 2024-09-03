<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // إنشاء طلب جديد
    public function store(Request $request, Product $product)
    {

        // التحقق من المستخدم
        if (! auth()->check()) {
            return response()->json(['auth_required' => true], 401);
        }

        // معالجة طلب المنتج وإنشاء الطلب
        $order = new Order();
        $order->product_id = $product->id;
        $order->user_id = Auth::id(); // استخدم Auth::id() للحصول على معرّف المستخدم
        $order->save();

        return response()->json(['message' => 'Product ordered successfully']);
    }
}
