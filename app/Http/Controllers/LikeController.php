<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // إضافة إعجاب
    public function store(Request $request)
    {
        $request->validate([
            'likeable_id' => 'required|integer',
            'likeable_type' => 'required|string',
        ]);

        Like::firstOrCreate([
            'user_id' => auth()->id(),
            'likeable_id' => $request->likeable_id,
            'likeable_type' => $request->likeable_type,
        ]);

        return response()->json(['success' => 'Like added successfully.']);
    }
}
