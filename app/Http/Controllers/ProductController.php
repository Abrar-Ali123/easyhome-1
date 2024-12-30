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

        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%'.$request->input('search').'%');
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

        if ($request->has('features')) {
            $query->whereJsonContains('features', $request->input('features'));
        }

        $products = $query->get();

        if ($request->ajax()) {
            return view('partials.search-results', compact('products'))->render();
        }

        return view('products.index', compact('products'));
    }

    public function single()
    {
        $products = Product::all();

        return view('single', compact('products'));
    }

    public function index1()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $featuresList = Product::$featuresList;
        $cities = City::all();

        return view('products.create', compact('featuresList', 'cities'));
    }

    public function store(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'video' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'neighborhood_id' => 'nullable|exists:cities,id',
            'price' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|integer',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'croquis' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'monthly_installment' => 'nullable|string',
            'ad_number' => 'nullable|string',
            'property_usage' => 'nullable|string',
            'property_facade' => 'nullable|string',
            'profile_project' => 'nullable|file|mimes:pdf,doc,docx,zip|max:2048',
        ]);

        $images = [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time().'_'.$image->getClientOriginalName();
                $path = $image->storeAs('public/images', $name);
                $images[] = str_replace('public/', '', $path);
            }
        }

        $profileProjectPath = null;
        if ($request->hasFile('profile_project')) {
            $profileProject = $request->file('profile_project');
            $fileName = time().'_'.$profileProject->getClientOriginalName();
            $path = $profileProject->storeAs('public/projects', $fileName);
            $profileProjectPath = str_replace('public/', '', $path);
        }

        $croquisPath = null;
        if ($request->hasFile('croquis')) {
            $croquis = $request->file('croquis');
            $croquisName = time().'_'.$croquis->getClientOriginalName();
            $path = $croquis->storeAs('public/croquis', $croquisName);
            $croquisPath = str_replace('public/', '', $path);
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
        $product->features = $request->features;
        $product->category = $request->category;
        $product->monthly_installment = $request->monthly_installment;
        $product->ad_number = $request->ad_number;
        $product->property_usage = $request->property_usage;
        $product->property_facade = $request->property_facade;
        $product->profile_project = $profileProjectPath;
        $product->croquis = $croquisPath;
        $product->created_by = $user->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName);
            $product->image = str_replace('public/', '', $path);
        }

        $product->images = json_encode($images);

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $cities = City::all();
        $product = Product::with('comments.likes')->findOrFail($id);
        $products = Product::where('id', '!=', $id)->paginate(10);

        return view('products.show', compact('product', 'cities', 'products'));
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
            'profile_project' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'croquis' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'monthly_installment' => 'nullable|numeric',
            'ad_number' => 'nullable|integer',
            'property_usage' => 'nullable|string',
            'property_facade' => 'nullable|string',
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
        $product->features = $request->features;
        $product->category = $request->category;
        $product->monthly_installment = $request->monthly_installment;
        $product->ad_number = $request->ad_number;
        $product->property_usage = $request->property_usage;
        $product->property_facade = $request->property_facade;

        $product->images = json_encode($images);

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
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
}
