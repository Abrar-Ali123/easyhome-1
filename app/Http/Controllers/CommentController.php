<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product; // تأكد من تضمين الموديل Product
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('comments.index', compact('comments'));
    }

    public function store(Request $request, Product $product)
    {
        // تحقق إذا كان المستخدم مسجل الدخول
        if (! Auth::check()) {
            // إرجاع استجابة تشير إلى أن المستخدم غير مسجل الدخول
            return response()->json(['auth_required' => true], 401);
        }

        // معالجة التعليق
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->product_id = $product->id;
        $comment->user_id = Auth::id(); // الحصول على معرف المستخدم الحالي
        $comment->save();

        return response()->json(['comment' => $comment->comment], 200);
    }

    public function toggleVisibility(Comment $comment)
    {
        $comment->toggleVisibility();

        return response()->json(['visible' => $comment->visible]);
    }
}
