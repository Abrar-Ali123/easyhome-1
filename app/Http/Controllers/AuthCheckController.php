<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthCheckController extends Controller
{
    public function check()
    {
        if (! Auth::check()) {
            // إذا لم يكن المستخدم مسجلاً الدخول، إرسال استجابة تشير إلى أن تسجيل الدخول مطلوب
            return response()->json(['auth_required' => true], 401);
        }

        // إذا كان المستخدم مسجلاً الدخول، إرسال استجابة تشير إلى عدم الحاجة لتسجيل الدخول
        return response()->json(['auth_required' => false], 200);
    }
}
