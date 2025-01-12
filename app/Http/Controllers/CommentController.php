<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // عرض جميع التعليقات
    public function index(Product $product)
    {
        $comments = $product->comments()->where('visible', true)->with('replies')->latest()->get();

        return response()->json($comments);
    }

    // إضافة تعليق جديد
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = $product->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return response()->json($comment);
    }

    // تعديل تعليق
    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id != auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment->update(['comment' => $request->comment]);

        return response()->json($comment);
    }

    // حذف تعليق
    public function destroy(Comment $comment)
    {
        if ($comment->user_id != auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted']);
    }

    // إضافة رد على تعليق
    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $reply = $comment->replies()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return response()->json($reply);
    }
}
