<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyValue;
use Illuminate\Http\Request;

class CompanyValueController extends Controller
{
    public function index()
    {
        $values = CompanyValue::orderBy('order')->get();
        return view('admin.company-values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.company-values.create');
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

        CompanyValue::create($validated);

        return redirect()->route('admin.company-values.index')
            ->with('success', 'تم إضافة القيمة بنجاح');
    }

    public function edit(CompanyValue $value)
    {
        return view('admin.company-values.edit', compact('value'));
    }

    public function update(Request $request, CompanyValue $value)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $value->update($validated);

        return redirect()->route('admin.company-values.index')
            ->with('success', 'تم تحديث القيمة بنجاح');
    }

    public function destroy(CompanyValue $value)
    {
        $value->delete();

        return redirect()->route('admin.company-values.index')
            ->with('success', 'تم حذف القيمة بنجاح');
    }
}
