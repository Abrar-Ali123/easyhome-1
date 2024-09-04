<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEmployeeRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // تحقق من وجود المستخدم
        if (! $user) {
            return redirect('login')->withErrors('يجب تسجيل الدخول للوصول إلى هذه الصفحة.');
        }

        // تحقق من كون المستخدم موظف
        if ($user->role !== 0) { // 0 = موظف
            return redirect('home')->withErrors('ليس لديك الصلاحيات المطلوبة للوصول إلى هذه الصفحة.');
        }

        return $next($request);
    }
}
