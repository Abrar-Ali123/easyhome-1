<?php

// App\Http\Middleware\Auth1.php

// App\Http\Middleware\Auth.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Auth_user
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
