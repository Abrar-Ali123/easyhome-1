<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'product', 'updatedBy'])->get();
        $employees = User::where('role', 1)->get();
        $statuses = ['معلق', 'مكتمل', 'ملغي'];

        return view('orders.index', compact('orders', 'employees', 'statuses'));
    }

    public function update(Request $request, Order $order)
    {
        // تحقق من صلاحية الموظف
        if (Auth::user()->role !== 0) {
            return redirect()->route('orders.index')->with('error', 'لا تملك صلاحيات لتحديث الطلبات');
        }

        // تحديث حالة الطلب
        $order->status = $request->input('status');
        $order->updated_by = Auth::id(); // تعيين الموظف الذي قام بتحديث الحالة
        $order->save();

        return redirect()->route('orders.index')->with('success', 'تم تحديث حالة الطلب بنجاح');
    }

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
