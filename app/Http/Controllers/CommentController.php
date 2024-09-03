<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
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
        if (! Auth::check()) {
            return response()->json(['auth_required' => true], 401);
        }

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->product_id = $product->id;
        $comment->user_id = Auth::id();
        $comment->save();

        return response()->json([
            'comment' => $comment->comment,
            'comment_id' => $comment->id,
            'user' => [
                'name' => $comment->user->name,
                'profile_image_url' => $comment->user->profile_image_url ?? '/path/to/default-avatar.png',
            ],
        ], 200);
    }

    public function update(Request $request, Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->comment = $request->input('comment');
        $comment->save();

        return response()->json(['comment' => $comment->comment], 200);
    }

    public function destroy(Comment $comment)
    {
        if (! Auth::check() || Auth::id() !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['success' => true], 200);
    }
}
