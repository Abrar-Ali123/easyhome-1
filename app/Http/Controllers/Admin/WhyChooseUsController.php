<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $reasons = WhyChooseUs::orderBy('order')->get();
        return view('admin.why-choose-us.index', compact('reasons'));
    }

    public function create()
    {
        return view('admin.why-choose-us.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        WhyChooseUs::create($validated);

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(WhyChooseUs $reason)
    {
        return view('admin.why-choose-us.edit', compact('reason'));
    }

    public function update(Request $request, WhyChooseUs $reason)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $reason->update($validated);

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(WhyChooseUs $reason)
    {
        $reason->delete();

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'تم الحذف بنجاح');
    }
}
