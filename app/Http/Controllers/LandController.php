<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index()
    {
        $lands = Land::all();
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
