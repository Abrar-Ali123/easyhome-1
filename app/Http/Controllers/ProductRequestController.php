<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ProductRequest;
use App\Models\User;
use App\ProductConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductRequestController extends Controller
{
    // دالة لجلب المدن التابعة
    public function getNeighborhoods($cityId)
    {
        // جلب المدن التابعة بناءً على معرف المدينة الرئيسية
        $subCities = City::where('parent_id', $cityId)->get();

        // إذا لم يتم العثور على مدن تابعة
        if ($subCities->isEmpty()) {
            return response()->json(['message' => 'لا توجد مدن تابعة لهذه المدينة.'], 404);
        }

        return response()->json($subCities);
    }

    // عرض نموذج طلب المنتج
    public function showRequestForm()
    {
        $cities = City::all(); // جلب كل المدن
        $categories = ProductConstants::CATEGORIES; // جلب التصنيفات

        return view('request-product', compact('cities', 'categories'));
    }

    public function submitRequest(Request $request)
    {
        // التحقق مما إذا كان المستخدم مسجل دخول
        if (auth()->check()) {
            // إذا كان مسجل دخول، استخدم بيانات المستخدم الحالي
            $user = auth()->user();
        } else {
            // إنشاء مستخدم جديد إذا لم يكن مسجلًا
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'salary' => $request->salary,
                'bank' => $request->bank,
                'age' => $request->age,
            ]);

            // تسجيل الدخول للمستخدم الجديد
            auth()->login($user);
        }

        // تحويل قائمة المدن التابعة إلى سلسلة نصية
        $neighborhoods = City::whereIn('id', $request->sub_cities)->pluck('name')->implode(', ');

        // حفظ طلب المنتج في قاعدة البيانات
        ProductRequest::create([
            'user_id' => $user->id,
            'city_id' => $request->parent_city,
            'category' => $request->category,
            'description' => $request->description,
            'neighborhoods' => $neighborhoods,
        ]);

        // تمرير رسالة نجاح

        return redirect()->back()->with('success', 'تم تسجيل طلبك بنجاح. سيتواصل فريق Easy Home معك في أقرب وقت.');
    }

    // عرض الطلبات في لوحة التحكم
    public function showProductRequests()
    {
        $productRequests = ProductRequest::with(['user', 'city'])->get(); // جلب الطلبات مع العلاقات

        return view('dashboard.product-requests', compact('productRequests'));
    }
}
