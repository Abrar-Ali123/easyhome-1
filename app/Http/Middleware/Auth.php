<?php

// App\Http\Middleware\Auth.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            // إرسال استجابة JSON تشير إلى أن تسجيل الدخول مطلوب
            return response()->json(['auth_required' => true], 401);
        }

        return $next($request);
    }
}
