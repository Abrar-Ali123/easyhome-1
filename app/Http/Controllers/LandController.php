<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\City;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index()
    {
        $lands = Land::with(['city', 'neighborhood'])->paginate(12);
        return view('lands.index', compact('lands'));
    }

    public function search(Request $request)
    {
        $query = Land::query();
        $query->with(['city', 'neighborhood']);

        // البحث حسب نوع الأرض
        if ($request->filled('land_type')) {
            $query->where('property_type', $request->land_type);
        }

        // البحث حسب المدينة
        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        // البحث حسب الحي
        if ($request->filled('neighborhood_id')) {
            $query->where('neighborhood_id', $request->neighborhood_id);
        }

        // البحث حسب نطاق السعر
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // البحث حسب المساحة
        if ($request->filled('min_area')) {
            $query->where('area', '>=', $request->min_area);
        }
        if ($request->filled('max_area')) {
            $query->where('area', '<=', $request->max_area);
        }

        // البحث حسب مميزات الأرض
        if ($request->filled('land_features')) {
            foreach ($request->land_features as $feature) {
                $query->where('features', 'like', '%' . $feature . '%');
            }
        }

        // البحث حسب مميزات الموقع
        if ($request->filled('location_features')) {
            foreach ($request->location_features as $feature) {
                $query->where('location_features', 'like', '%' . $feature . '%');
            }
        }

        $lands = $query->paginate(12)->withQueryString();
        return view('lands.index', compact('lands'));
    }

    public function create()
    {
        return view('lands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'nullable|image'
        ]);

        $land = new Land($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $land->image = $path;
        }

        $land->save();

        return redirect()->route('lands.index')->with('message', 'تم إضافة الأرض بنجاح!');
    }

    public function show($id)
    {
        $land = Land::findOrFail($id);
        return view('lands.show', compact('land'));
    }

    public function edit($id)
    {
        $land = Land::findOrFail($id);
        return view('lands.edit', compact('land'));
    }

    public function update(Request $request, $id)
    {
        $land = Land::findOrFail($id);
        $land->update($request->all());
        return redirect()->route('lands.index')->with('success', 'تم تحديث الأرض بنجاح.');
    }

    public function destroy($id)
    {
        $land = Land::findOrFail($id);
        $land->delete();
        return redirect()->route('lands.index')->with('success', 'تم حذف الأرض بنجاح.');
    }
}
