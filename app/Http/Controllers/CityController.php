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

    public function store(Request $request)
    {
        $city = new City();
        $city->name = $request->name;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('cities', 'public');
            $city->image = $path;
        }

        $city->save();

        if ($request->ajax()) {
            return view('dashboard.cities._row', compact('city'))->render();
        }

        return redirect()->route('cities.index');
    }

    public function edit(City $city)
    {
        return response()->json($city);
    }

    public function update(Request $request, City $city)
    {
        $city->name = $request->name;

        if ($request->hasFile('image')) {
            if ($city->image) {
                Storage::delete('public/'.$city->image);
            }
            $path = $request->file('image')->store('cities', 'public');
            $city->image = $path;
        }

        $city->save();

        if ($request->ajax()) {
            return view('dashboard.cities._row', compact('city'))->render();
        }

        return redirect()->route('cities.index');
    }

    public function destroy(City $city)
    {
        if ($city->image) {
            Storage::delete('public/'.$city->image);
        }
        $city->delete();

        return response()->json(['success' => true]);
    }
}
