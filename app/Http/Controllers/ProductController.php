<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index1(Request $request)
    {
        $query = Product::query();

        // البحث حسب الكلمات المفتاحية
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('features', 'like', "%{$search}%");
            });
        }

        // الفلترة حسب المدينة
        if ($request->has('city_id') && ! empty($request->input('city_id'))) {
            $query->where('city_id', $request->input('city_id'));
        }

        // الفلترة حسب السعر
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }

        // الفلترة حسب عدد الغرف
        if ($request->has('bedrooms')) {
            $query->where('bedrooms', $request->input('bedrooms'));
        }

        // الفلترة حسب عدد الحمامات
        if ($request->has('bathrooms')) {
            $query->where('bathrooms', $request->input('bathrooms'));
        }

        // الفلترة حسب المساحة
        if ($request->has('min_area') && $request->has('max_area')) {
            $query->whereBetween('area', [$request->input('min_area'), $request->input('max_area')]);
        }

        // إحضار النتائج مع التصفح
        $products = $query->paginate(9);

        // إحضار قائمة المدن للفلترة
        $cities = City::all();

        return view('product', compact('products', 'cities'));
    }

    /**
     * عرض قائمة المنتجات.
     *
     * @return \Illuminate\Http\Response
     */
    public function single()
    {
        $products = Product::all();

        return view('single', compact('products'));
    }

    public function index()
    {

        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * عرض نموذج إنشاء منتج جديد.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // نحصل على قائمة المميزات من الموديل
        $featuresList = Product::$featuresList;
        $cities = City::all();

        // نمرر قائمة المميزات إلى الـ View
        return view('products.create', compact('featuresList', 'cities'));
    }

    /**
     * تخزين منتج جديد.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'video' => 'required|string',

            'city_id' => 'required|exists:cities,id',

            'price' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|integer',
            'features' => 'nullable|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $images = [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time().'_'.$image->getClientOriginalName();
                $path = $image->storeAs('public/images', $name); // حفظ في storage/app/public/images
                $images[] = str_replace('public/', '', $path); // احفظ المسار الجزئي فقط
            }
        }

        $product = new Product();
        $product->title = $request->title;
        $product->city_id = $request->city_id;
        $product->video = $request->video;

        $product->description = $request->description;
        $product->location = $request->location;
        $product->price = $request->price;
        $product->bedrooms = $request->bedrooms;
        $product->bathrooms = $request->bathrooms;
        $product->area = $request->area;
        $product->features = $request->features;
        $product->category = $request->category;
        $product->created_by = $user->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName); // حفظ في storage/app/public/images
            $product->image = str_replace('public/', '', $path); // احفظ المسار الجزئي فقط
        }

        $product->images = json_encode($images);

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * عرض تفاصيل منتج محدد.
     *
     * @return \Illuminate\Http\Response
     */
    // داخل ProductController.php
    public function show($id)
    {

        $cities = City::all();
        $product = Product::with('comments.likes')->findOrFail($id);

        return view('products.show', compact('product', 'cities'));
    }

    /**
     * عرض نموذج تعديل منتج.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $featuresList = [
            'مرآب' => 'fas fa-car',
            'مسبح' => 'fas fa-swimming-pool',
            'حديقة' => 'fas fa-tree',
            'أمن' => 'fas fa-shield-alt',
        ];

        return view('products.edit', compact('product', 'featuresList'));
    }

    /**
     * تحديث منتج محدد.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'video' => 'required|string',

            'price' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|integer',
            'features' => 'nullable|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $images = json_decode($product->images, true) ?? [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time().'_'.$image->getClientOriginalName();
                $path = $image->storeAs('public/images', $name); // حفظ في storage/app/public/images
                $images[] = str_replace('public/', '', $path); // احفظ المسار الجزئي فقط
            }
        }

        $product->title = $request->title;
        $product->description = $request->description;

        $product->video = $request->video;

        $product->location = $request->location;
        $product->price = $request->price;
        $product->bedrooms = $request->bedrooms;
        $product->bathrooms = $request->bathrooms;
        $product->area = $request->area;
        $product->features = $request->features;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($product->image && Storage::exists('public/'.str_replace('storage/', '', $product->image))) {
                Storage::delete('public/'.str_replace('storage/', '', $product->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName); // حفظ في storage/app/public/images
            $product->image = str_replace('public/', '', $path); // احفظ المسار الجزئي فقط
        }

        $product->images = json_encode($images);

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * حذف منتج محدد.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // حذف الصورة الرئيسية إذا كانت موجودة
        if ($product->image && Storage::exists('public/'.str_replace('storage/', '', $product->image))) {
            Storage::delete('public/'.str_replace('storage/', '', $product->image));
        }

        // حذف الصور الإضافية
        $images = json_decode($product->images, true) ?? [];
        foreach ($images as $image) {
            $imagePath = str_replace('storage/', '', $image);
            if (Storage::exists('public/'.$imagePath)) {
                Storage::delete('public/'.$imagePath);
            }
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
