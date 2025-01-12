<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth_user
{
    public function handle(Request $request, Closure $next)
    {
        // تحقق إذا كان المستخدم غير مسجل الدخول
        if (! auth()->check()) {
            // إعادة استجابة 403 بدون محتوى
            return response('', 403);
        }

        return $next($request);
    }
}
