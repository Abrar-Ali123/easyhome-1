<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        $mainCities = City::whereNull('parent_id')->get(); // جلب المدن الرئيسية فقط
        $subCities = City::whereNotNull('parent_id')->get(); // جلب المدن التابعة

        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        if ($request->has('city_id')) {
            $query->where('city_id', $request->input('city_id'));
        }

        if ($request->has('neighborhood_id')) {
            $query->where('neighborhood_id', $request->input('neighborhood_id'));
        }

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        if ($request->has('property_features')) {
            $query->whereJsonContains('property_features', $request->input('property_features'));
        }

        if ($request->has('location_features')) {
            $query->whereJsonContains('location_features', $request->input('location_features'));
        }

        $products = $query->get();

        if ($request->ajax()) {
            return view('partials.search-results', compact('products'))->render();
        }

        return view('products.index', compact('products', 'mainCities', 'subCities'));
    }

    public function properties(Request $request)
    {
        $query = Product::query();

        // البحث في جميع الأعمدة بشكل متسلسل
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $this->applySearchFilter($query, $searchTerm);
        }

        // تطبيق الفلاتر بناءً على الطلب
        $this->applyFilters($query, $request);

        // جلب النتائج
        $products_query = $query->get();

        // إظهار رسالة في حالة عدم وجود نتائج
        if ($products_query->isEmpty()) {
            return redirect()->back()->with('error', 'لم يتم العثور على نتائج تطابق معايير البحث.');
        }

        // جلب المدن الرئيسية والفرعية فقط عند الحاجة
        $mainCities = City::whereNull('parent_id')->get();
        $subCities = City::whereNotNull('parent_id')->get();

        return view('property', compact('products_query', 'mainCities', 'subCities'));
    }

    private function applySearchFilter($query, $searchTerm)
    {
        $columns = ['title', 'description', 'city_id', 'neighborhood_id', 'category', 'bedrooms', 'bathrooms'];
        $query->where(function ($q) use ($searchTerm, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', '%' . $searchTerm . '%');
            }
        });
    }

    private function applyFilters($query, $request)
    {
        // فلترة حسب المدينة
        if ($request->has('city_id')) {
            $query->where('city_id', $request->input('city_id'));
        }

        // فلترة حسب الحي
        if ($request->has('neighborhood_id')) {
            $query->where('neighborhood_id', $request->input('neighborhood_id'));
        }

        // فلترة حسب عدد الغرف
        if ($request->has('bedrooms')) {
            $query->where('bedrooms', $request->input('bedrooms'));
        }

        // فلترة حسب عدد دورات المياه
        if ($request->has('bathrooms')) {
            $query->where('bathrooms', $request->input('bathrooms'));
        }

        // فلترة حسب نوع العقار
        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }

        // فلترة حسب مميزات العقار
        if ($request->has('property_features')) {
            $propertyFeatures = $request->input('property_features');
            foreach ($propertyFeatures as $feature) {
                $query->whereJsonContains('property_features', $feature);
            }
        }

        // فلترة حسب مميزات الموقع
        if ($request->has('location_features')) {
            $locationFeatures = $request->input('location_features');
            foreach ($locationFeatures as $feature) {
                $query->whereJsonContains('location_features', $feature);
            }
        }
        
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

    }
    
    
    
    
    
    
        public function create()
    {
        $featuresList = Product::$featuresList;
 $mainCities = City::whereNull('parent_id')->get(); // جلب المدن الرئيسية فقط
        $subCities = City::whereNotNull('parent_id')->get(); // جلب المدن
        
        
        
        return view('products.create', compact('featuresList','mainCities', 'subCities'));
    }
    public function store(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        $images = [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('public/images', $name);
                $images[] = str_replace('public/', '', $path);
            }
        }

        $product = new Product;
        $product->title = $request->title;
        $product->city_id = $request->city_id;
        $product->neighborhood_id = $request->neighborhood_id;
        $product->video = $request->video;
        $product->description = $request->description;
        $product->location = $request->location;
        $product->price = $request->price;
        $product->bedrooms = $request->bedrooms;
        $product->bathrooms = $request->bathrooms;
        $product->area = $request->area;
        $product->property_features = $request->property_features; // ✅ استبدال المميزات هنا
        $product->location_features = $request->location_features; // ✅ استبدال المميزات هنا
        $product->category = $request->category;
        $product->monthly_installment = $request->monthly_installment;
        $product->ad_number = $request->ad_number;
        $product->property_usage = $request->property_usage;
        $product->property_facade = $request->property_facade;
        $product->created_by = $user->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName);
            $product->image = str_replace('public/', '', $path);
        }

        $product->images = json_encode($images);
        $product->save();

        return redirect()->route('products.index')->with('success', 'تم إنشاء المنتج بنجاح.');
    }

    public function update(Request $request, Product $product)
    {
        $images = json_decode($product->images, true) ?? [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('public/images', $name);
                $images[] = str_replace('public/', '', $path);
            }
        }

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists('public/' . str_replace('storage/', '', $product->image))) {
                Storage::delete('public/' . str_replace('storage/', '', $product->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
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
        $product->property_features = $request->property_features; // ✅ استبدال المميزات هنا
        $product->location_features = $request->location_features; // ✅ استبدال المميزات هنا
        $product->category = $request->category;
        $product->monthly_installment = $request->monthly_installment;
        $product->ad_number = $request->ad_number;
        $product->property_usage = $request->property_usage;
        $product->property_facade = $request->property_facade;

        $product->images = json_encode($images);
        $product->save();

        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }
}
