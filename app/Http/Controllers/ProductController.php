<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ProductRequest;
use App\ProductConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // لضمان الحصول على التصنيفات

class ProductRequestController extends Controller
{
    /**
     * عرض قائمة طلبات المنتجات.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productRequests = ProductRequest::with(['user', 'city'])->get(); // الحصول على الطلبات مع العلاقات

        return view('product_requests.index', compact('productRequests'));
    }

    /**
     * عرض نموذج إنشاء طلب منتج جديد.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all(); // الحصول على قائمة المدن
        $categories = ProductConstants::CATEGORIES; // الحصول على التصنيفات من الـ ProductConstants

        return view('product_requests.create', compact('cities', 'categories'));
    }

    /**
     * تخزين طلب منتج جديد.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'city' => 'required|exists:cities,id',
            'neighborhoods' => 'required|string',
            'category' => 'required|string|in:'.implode(',', array_keys(ProductConstants::CATEGORIES)),
            'description' => 'required|string',
        ]);

        ProductRequest::create([
            'user_id' => $user->id,
            'city_id' => $request->city,
            'neighborhoods' => $request->neighborhoods,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('product_requests.index')
            ->with('success', 'تم إرسال طلب المنتج بنجاح.');
    }

    /**
     * عرض تفاصيل طلب منتج محدد.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productRequest = ProductRequest::with(['user', 'city'])->findOrFail($id);

        return view('product_requests.show', compact('productRequest'));
    }

    /**
     * عرض نموذج تعديل طلب منتج.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productRequest = ProductRequest::findOrFail($id);
        $cities = City::all();
        $categories = ProductConstants::CATEGORIES; // الحصول على التصنيفات لتعديلها

        return view('product_requests.edit', compact('productRequest', 'cities', 'categories'));
    }

    /**
     * تحديث طلب منتج محدد.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductRequest $productRequest)
    {
        $request->validate([
            'city' => 'required|exists:cities,id',
            'neighborhoods' => 'required|string',
            'category' => 'required|string|in:'.implode(',', array_keys(ProductConstants::CATEGORIES)),
            'description' => 'required|string',
        ]);

        $productRequest->update([
            'city_id' => $request->city,
            'neighborhoods' => $request->neighborhoods,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('product_requests.index')
            ->with('success', 'تم تحديث طلب المنتج بنجاح.');
    }

    /**
     * حذف طلب منتج محدد.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRequest $productRequest)
    {
        $productRequest->delete();

        return redirect()->route('product_requests.index')
            ->with('success', 'تم حذف طلب المنتج بنجاح.');
    }
}
