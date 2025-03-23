<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login')->withErrors('يجب تسجيل الدخول للوصول إلى هذه الصفحة.');
        }

        if (!Auth::user()->hasRole($role)) {
            return redirect()->back()->withErrors('ليس لديك الصلاحيات المطلوبة للوصول إلى هذه الصفحة.');
        }

        return $next($request);
    }
}
