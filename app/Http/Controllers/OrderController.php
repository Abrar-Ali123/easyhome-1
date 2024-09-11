<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // عرض الطلبات
    public function index()
    {
        $orders = Order::with(['user', 'updatedBy'])->get();
        $statuses = ['معلق', 'مكتمل', 'ملغي'];

        return view('orders.index', compact('orders', 'statuses'));
    }

    // تحديث الطلب
    public function update(Request $request)
    {
        // البحث عن الطلب باستخدام المعرف المرسل في الطلب
        $order = Order::find($request->input('order_id'));

        // التحقق من وجود الطلب
        if (! $order) {
            return response()->json(['success' => false, 'message' => 'الطلب غير موجود']);
        }

        // تحديث حالة الطلب وتعيين الموظف الذي قام بالتحديث
        $order->status = $request->input('status');
        $order->updated_by = Auth::id();
        $order->save();

        // إعداد البيانات المسترجعة لتحديث الواجهة
        return response()->json([
            'success' => true,
            'message' => 'تم تحديث حالة الطلب بنجاح',
            'updated_at' => $order->updated_at->format('d-m-Y H:i'),
            'updated_by' => $order->updatedBy->name ?? 'غير محدد',
        ]);
    }
}
