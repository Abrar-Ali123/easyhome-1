<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryBlogController extends Controller
{
    /**
     * عرض قائمة جميع التصنيفات.
     */
    public function index()
    {
        $categories = CategoryBlog::paginate(10); // تقسيم إلى صفحات

        return view('category_blog.index', compact('categories'));
    }

    /**
     * عرض نموذج إنشاء تصنيف جديد.
     */
    public function create()
    {
        return view('category_blog.create');
    }

    /**
     * تخزين التصنيف الجديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category_blogs|max:255',
            'description' => 'nullable',
        ]);

        CategoryBlog::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('category_blog.index')->with('success', 'تم إنشاء التصنيف بنجاح');
    }

    /**
     * عرض تفاصيل تصنيف معين.
     */
    public function show(CategoryBlog $categoryBlog)
    {
        return view('category_blog.show', compact('categoryBlog'));
    }

    /**
     * عرض نموذج تعديل تصنيف موجود.
     */
    public function edit(CategoryBlog $categoryBlog)
    {
        return view('category_blog.edit', compact('categoryBlog'));
    }

    /**
     * تحديث بيانات التصنيف في قاعدة البيانات.
     */
    public function update(Request $request, CategoryBlog $categoryBlog)
    {
        $request->validate([
            'name' => 'required|max:255|unique:category_blogs,name,'.$categoryBlog->id,
            'description' => 'nullable',
        ]);

        $categoryBlog->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('category_blog.index')->with('success', 'تم تحديث التصنيف بنجاح');
    }

    /**
     * حذف التصنيف من قاعدة البيانات.
     */
    public function destroy(CategoryBlog $categoryBlog)
    {
        $categoryBlog->delete();

        return redirect()->route('category_blog.index')->with('success', 'تم حذف التصنيف بنجاح');
    }
}
