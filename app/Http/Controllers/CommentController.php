<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // عرض التعليقات
    public function index()
    {
        $comments = Comment::all();

        return view('comments.index', compact('comments'));
    }

    // إنشاء تعليق جديد
    public function store(Request $request, Product $product)
    {
        // معالجة التعليق
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->product_id = $product->id;
        $comment->user_id = auth()->id();
        $comment->save();

        return response()->json(['comment' => $comment->comment], 200);
    }

    // تبديل ظهور التعليق
    public function toggleVisibility(Comment $comment)
    {
        $comment->toggleVisibility();

        return response()->json(['visible' => $comment->visible]);
    }
}
