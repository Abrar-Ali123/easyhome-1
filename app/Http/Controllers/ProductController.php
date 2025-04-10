<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search', 'getNeighborhoods', 'properties']);
    }

    public function index(Request $request)
    {
        try {
            $query = Product::query();

            if ($request->has('search') && $request->input('search') !== '') {
                $query->where('title', 'LIKE', '%'.$request->input('search').'%');
            }

            if ($request->has('city_id') && $request->input('city_id') !== '') {
                $query->where('city_id', $request->input('city_id'));
            }

            if ($request->has('neighborhood_id') && $request->input('neighborhood_id') !== '') {
                $query->where('neighborhood_id', $request->input('neighborhood_id'));
            }

            if ($request->has('min_price') && $request->input('min_price') !== '') {
                $query->where('price', '>=', $request->input('min_price'));
            }

            if ($request->has('max_price') && $request->input('max_price') !== '') {
                $query->where('price', '<=', $request->input('max_price'));
            }

            if ($request->has('bedrooms') && $request->input('bedrooms') !== '') {
                $query->where('bedrooms', $request->input('bedrooms'));
            }

            if ($request->has('bathrooms') && $request->input('bathrooms') !== '') {
                $query->where('bathrooms', $request->input('bathrooms'));
            }

            if ($request->has('features') && !empty($request->input('features'))) {
                $features = (array)$request->input('features');
                foreach ($features as $feature) {
                    $query->whereJsonContains('features', $feature);
                }
            }

            $products = $query->with(['city', 'neighborhood'])->get();

            if ($request->ajax()) {
                return view('products.search-results', compact('products'))->render();
            }

            return view('products.search-results', compact('products'));
        } catch (\Exception $e) {
            \Log::error('خطأ في البحث: ' . $e->getMessage());
            if ($request->ajax()) {
                return response()->json(['error' => 'حدث خطأ أثناء البحث. الرجاء المحاولة مرة أخرى.'], 500);
            }
            return back()->with('error', 'حدث خطأ أثناء البحث. الرجاء المحاولة مرة أخرى.');
        }
    }

    public function search(Request $request)
    {
        try {
            \Log::info('بيانات البحث:', $request->all());

            $query = Product::query();

            // تطبيق المعايير فقط إذا تم تحديدها
            if ($request->filled('category')) {
                $query->where('category', $request->input('category'));
            }

            if ($request->filled('search')) {
                $query->where('title', 'LIKE', '%'.$request->input('search').'%');
            }

            if ($request->filled('city_id')) {
                $query->where('city_id', $request->input('city_id'));
            }

            if ($request->filled('neighborhood_id')) {
                $query->where('neighborhood_id', $request->input('neighborhood_id'));
            }

            if ($request->filled('min_price') && $request->input('min_price') > 0) {
                $query->where('price', '>=', $request->input('min_price'));
            }

            if ($request->filled('max_price') && $request->input('max_price') < 1000000) {
                $query->where('price', '<=', $request->input('max_price'));
            }

            if ($request->filled('bedrooms') && $request->input('bedrooms') != '') {
                $query->where('bedrooms', $request->input('bedrooms'));
            }

            if ($request->filled('bathrooms') && $request->input('bathrooms') != '') {
                $query->where('bathrooms', $request->input('bathrooms'));
            }

            if ($request->filled('features') && !empty($request->input('features'))) {
                $features = (array)$request->input('features');
                foreach ($features as $feature) {
                    if (!empty($feature)) {
                        $query->whereJsonContains('features', $feature);
                    }
                }
            }

            // البحث حسب مميزات العقار
            if ($request->filled('property_features')) {
                $propertyFeatures = $request->input('property_features');
                foreach ($propertyFeatures as $feature) {
                    $query->where('property_features', 'LIKE', '%'.$feature.'%');
                }
            }

            // البحث حسب مميزات الموقع
            if ($request->filled('location_features')) {
                $locationFeatures = $request->input('location_features');
                foreach ($locationFeatures as $feature) {
                    $query->where('location_features', 'LIKE', '%'.$feature.'%');
                }
            }

            // تسجيل الاستعلام النهائي
            \Log::info('SQL Query:', [
                'sql' => $query->toSql(),
                'bindings' => $query->getBindings()
            ]);

            // تحميل العلاقات وتنفيذ الاستعلام
            $products = $query->with(['city', 'neighborhood'])->latest()->paginate(12);

            // تسجيل عدد النتائج
            \Log::info('عدد النتائج:', ['count' => $products->count()]);

            // التحقق من وجود نتائج
            if ($products->isEmpty()) {
                if ($request->ajax()) {
                    return response()->json([
                        'html' => view('products.search-results', compact('products'))->render(),
                        'message' => 'لا توجد نتائج للبحث'
                    ]);
                }
                return view('products.search-results', compact('products'))->with('message', 'لا توجد نتائج للبحث');
            }

            // إرجاع النتائج
            if ($request->ajax()) {
                return response()->json([
                    'html' => view('products.search-results', compact('products'))->render()
                ]);
            }

            return view('products.search-results', compact('products'));

        } catch (\Exception $e) {
            \Log::error('خطأ في البحث: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'حدث خطأ أثناء البحث. الرجاء المحاولة مرة أخرى.',
                    'details' => $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'حدث خطأ أثناء البحث. الرجاء المحاولة مرة أخرى.');
        }
    }

    public function single()
    {
        $products = Product::all();

        return view('single', compact('products'));
    }

    public function create()
    {
        $featuresList = Product::$featuresList;
        $cities = City::all();

        return view('products.create', compact('featuresList', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'price' => 'nullable|numeric',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'area' => 'nullable|integer',
            'video' => 'nullable|string',
            'property_features' => 'nullable|array',
            'location_features' => 'nullable|array',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'monthly_installment' => 'nullable|numeric',
            'ad_number' => 'nullable|integer',
            'property_usage' => 'nullable|string',
            'property_facade' => 'nullable|string',
            'profile_project' => 'nullable|file|mimes:pdf,doc,docx',
            'croquis' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $product = new Product();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName);
            $product->image = str_replace('public/', '', $path);
        }

        $images = [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time().'_'.$image->getClientOriginalName();
                $path = $image->storeAs('public/images', $name);
                $images[] = str_replace('public/', '', $path);
            }
        }

        if ($request->hasFile('croquis')) {
            $croquis = $request->file('croquis');
            $croquisName = time().'_'.$croquis->getClientOriginalName();
            $path = $croquis->storeAs('public/croquis', $croquisName);
            $product->croquis = str_replace('public/', '', $path);
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->video = $request->video;
        $product->location = $request->location;
        $product->price = $request->price;
        $product->bedrooms = $request->bedrooms;
        $product->bathrooms = $request->bathrooms;
        $product->area = $request->area;
        $product->category = $request->category;
        $product->city_id = $request->city_id;
        $product->neighborhood_id = $request->neighborhood_id;
        $product->monthly_installment = $request->monthly_installment;
        $product->ad_number = $request->ad_number;
        $product->property_usage = $request->property_usage;
        $product->property_facade = $request->property_facade;
        $product->images = json_encode($images);
        
        // حفظ المميزات كسلسلة نصية مفصولة بفواصل
        $product->property_features = $request->has('property_features') ? implode(',', $request->property_features) : null;
        $product->location_features = $request->has('location_features') ? implode(',', $request->location_features) : null;

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'تم إضافة العقار بنجاح.');
    }

    public function show($id)
    {
        $product = Product::with(['city', 'neighborhood'])
            ->findOrFail($id);

        $products = Product::where('id', '!=', $id)
            ->where('category', $product->category)
            ->paginate(10);

        return view('products.show', compact('product', 'products'));
    }

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

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'price' => 'nullable|numeric',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'area' => 'nullable|integer',
            'video' => 'nullable|string',
            'property_features' => 'nullable|array',
            'location_features' => 'nullable|array',
            'category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'monthly_installment' => 'nullable|numeric',
            'ad_number' => 'nullable|integer',
            'property_usage' => 'nullable|string',
            'property_facade' => 'nullable|string',
            'profile_project' => 'nullable|file|mimes:pdf,doc,docx',
            'croquis' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $images = json_decode($product->images, true) ?? [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time().'_'.$image->getClientOriginalName();
                $path = $image->storeAs('public/images', $name);
                $images[] = str_replace('public/', '', $path);
            }
        }

        if ($request->hasFile('croquis')) {
            if ($product->croquis && Storage::exists('public/'.$product->croquis)) {
                Storage::delete('public/'.$product->croquis);
            }
            $croquis = $request->file('croquis');
            $croquisName = time().'_'.$croquis->getClientOriginalName();
            $path = $croquis->storeAs('public/croquis', $croquisName);
            $product->croquis = str_replace('public/', '', $path);
        }

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists('public/'.str_replace('storage/', '', $product->image))) {
                Storage::delete('public/'.str_replace('storage/', '', $product->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName);
            $product->image = str_replace('public/', '', $path);
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->video = $request->video;
        $product->location = $request->location;
        $product->price = $request->price;
        $product->bedrooms = $request->bedrooms;
        $product->bathrooms = $request->bathrooms;
        $product->area = $request->area;
        $product->category = $request->category;
        $product->monthly_installment = $request->monthly_installment;
        $product->ad_number = $request->ad_number;
        $product->property_usage = $request->property_usage;
        $product->property_facade = $request->property_facade;
        $product->images = json_encode($images);

        // تحديث المميزات
        $product->property_features = $request->has('property_features') ? implode(',', $request->property_features) : null;
        $product->location_features = $request->has('location_features') ? implode(',', $request->location_features) : null;

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'تم تحديث العقار بنجاح.');
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::exists('public/'.str_replace('storage/', '', $product->image))) {
            Storage::delete('public/'.str_replace('storage/', '', $product->image));
        }

        if ($product->croquis && Storage::exists('public/'.$product->croquis)) {
            Storage::delete('public/'.$product->croquis);
        }

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

    public function properties()
    {
        $products = Product::all();
        return view('products.properties', compact('products'));
    }

    public function getNeighborhoods($cityId)
    {
        try {
            $neighborhoods = City::where('parent_id', $cityId)->get();
            return response()->json($neighborhoods);
        } catch (\Exception $e) {
            \Log::error('خطأ في جلب الأحياء: ' . $e->getMessage());
            return response()->json(['error' => 'حدث خطأ أثناء جلب الأحياء'], 500);
        }
    }
}
