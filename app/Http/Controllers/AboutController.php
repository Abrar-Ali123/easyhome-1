<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first(); // الحصول على أول سجل
        if (!$about) {
            $about = About::create([
                'title' => 'نحن نحقق أحلام السكن المثالي',
                'content' => 'في إيزي هوم العقارية، نقدم خدمات متكاملة في مجال العقارات، تشمل بيع وشراء العقارات السكنية والتجارية، إدارة الممتلكات، والاستشارات العقارية. هدفنا هو تلبية احتياجاتكم بجودة واحترافية عالية.'
            ]);
        }
        return view('about', compact('about'));
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        About::create($validated);

        return redirect()->route('about.index')->with('success', 'تم إضافة المعلومات بنجاح.');
    }

    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $about->update($validated);

        return redirect()->route('about.index')->with('success', 'تم تحديث المعلومات بنجاح.');
    }

    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('about.index')->with('success', 'تم حذف المعلومات بنجاح.');
    }
}
