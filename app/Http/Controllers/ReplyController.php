<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    // إنشاء رد جديد
    public function store(Request $request, $commentId)
    {
        $request->validate([
            'reply' => 'required|string|max:1000',
        ]);

        Reply::create([
            'comment_id' => $commentId,
            'user_id' => auth()->id(),
            'reply' => $request->reply,
        ]);

        return response()->json(['success' => 'Reply added successfully.']);
    }
}
