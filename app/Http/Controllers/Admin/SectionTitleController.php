<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use Illuminate\Http\Request;

class SectionTitleController extends Controller
{
    public function index()
    {
        $sectionTitles = SectionTitle::orderBy('order')->get();
        return view('admin.section-titles.index', compact('sectionTitles'));
    }

    public function edit(SectionTitle $sectionTitle)
    {
        return view('admin.section-titles.edit', compact('sectionTitle'));
    }

    public function update(Request $request, SectionTitle $sectionTitle)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        // لا نسمح بتغيير section_key أو order
        unset($validated['section_key']);
        unset($validated['order']);

        $sectionTitle->update($validated);

        return redirect()->route('admin.section-titles.index')
            ->with('success', 'تم تحديث عنوان القسم بنجاح');
    }
}
