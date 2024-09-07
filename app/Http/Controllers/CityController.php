<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    public function index(Request $request)
    {

        $cities = City::query();

        if ($request->has('name')) {
            $cities->where('name', 'like', '%'.$request->name.'%');
        }

        $cities = $cities->get();

        if ($request->ajax()) {
            return view('dashboard.cities._table', compact('cities'))->render();
        }

        return view('dashboard.cities.index', compact('cities'));
    }

//    public function store(Request $request)
//    {
//        $city = new City();
//        $city->name = $request->name;
//
//        if ($request->hasFile('image')) {
//            $path = $request->file('image')->store('cities', 'public');
//            $city->image = $path;
//        }
//
//        $city->save();
//
//        if ($request->ajax()) {
//            return view('dashboard.cities._row', compact('city'))->render();
//        }
//
//        return redirect()->route('cities.index');
//    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        City::create([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('cities.index')->with('success', 'تمت إضافة المدينة بنجاح');
    }
//    public function edit(City $city)
//    {
//        return response()->json($city);
//    }

    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

//    public function update(Request $request, City $city)
//    {
//        $city->name = $request->name;
//
//        if ($request->hasFile('image')) {
//            if ($city->image) {
//                Storage::delete('public/'.$city->image);
//            }
//            $path = $request->file('image')->store('cities', 'public');
//            $city->image = $path;
//        }
//
//        $city->save();
//
//        if ($request->ajax()) {
//            return view('dashboard.cities._row', compact('city'))->render();
//        }
//
//        return redirect()->route('cities.index');
//    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $city->image = $imagePath;
        }

        $city->name = $request->name;
        $city->save();

        return redirect()->route('cities.index')->with('success', 'تم تعديل المدينة بنجاح');
    }
//    public function destroy(City $city)
//    {
//        if ($city->image) {
//            Storage::delete('public/'.$city->image);
//        }
//        $city->delete();
//
//        return response()->json(['success' => true]);
//    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success', 'تم حذف المدينة بنجاح');
    }
}
