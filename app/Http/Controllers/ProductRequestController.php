<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ProductRequest;
use App\ProductConstants;
use Illuminate\Http\Request;

class ProductRequestController extends Controller
{
    // عرض نموذج طلب المنتج
    public function showRequestForm()
    {
        $cities = City::all(); // الحصول على المدن من قاعدة البيانات
        $categories = ProductConstants::CATEGORIES; // استخدام التصنيفات من ProductConstants

        return view('request-product', compact('cities', 'categories'));
    }

    // معالجة طلب إرسال المنتج
    public function submitRequest(Request $request)
    {
        // التحقق من المدخلات
        $request->validate([
            'city' => 'required|exists:cities,id',
            'neighborhoods' => 'required|string',
            'category' => 'required|string|in:'.implode(',', array_keys(ProductConstants::CATEGORIES)),
            'description' => 'required|string',
        ]);

        // حفظ طلب المنتج في قاعدة البيانات
        ProductRequest::create([
            'user_id' => auth()->user()->id,
            'city_id' => $request->city,
            'neighborhoods' => $request->neighborhoods,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'تم إرسال طلب المنتج بنجاح.');
    }

    // عرض الطلبات في لوحة التحكم (Dashboard)
    public function showProductRequests()
    {
        $productRequests = ProductRequest::with(['user', 'city'])->get(); // الحصول على الطلبات مع العلاقات

        return view('dashboard.product-requests', compact('productRequests'));
    }
}
