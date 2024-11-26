<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function userPosts()
    {
        $posts = Post::paginate(10); // عرض المنشورات المنشورة فقط

        return view('posts.userindex', compact('posts'));
    }

    public function userIndex()
    {
        $posts = Post::latest()->paginate(12); // جلب المنشورات مع تقسيم الصفحات

        return view('posts.user_index', compact('posts'));
    }

    public function index()
    {
        $posts = Post::paginate(10); // أو استخدم أي منطق يناسب عرض البوستات

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = CategoryBlog::all();

        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'meta_description' => 'nullable|max:160',
            'keywords' => 'nullable',
            'category_blog_id' => 'required|exists:category_blogs,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // التحقق من نوع الصورة
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public'); // تخزين الصورة في مجلد 'posts' داخل 'storage/app/public'
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'meta_description' => $request->meta_description,
            'keywords' => $request->keywords,
            'category_blog_id' => $request->category_blog_id,
            'image' => $imagePath, // حفظ مسار الصورة
        ]);

        return redirect()->route('posts.index')->with('success', 'تم إنشاء البوست بنجاح');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = CategoryBlog::all();

        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,'.$post->id,
            'content' => 'required',
            'meta_description' => 'nullable|max:160',
            'keywords' => 'nullable',
            'category_blog_id' => 'required|exists:category_blogs,id',
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'meta_description' => $request->meta_description,
            'keywords' => $request->keywords,
            'category_blog_id' => $request->category_blog_id,
        ]);

        return redirect()->route('post.index')->with('success', 'تم تحديث البوست بنجاح');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->with('success', 'تم حذف البوست بنجاح');
    }
}
