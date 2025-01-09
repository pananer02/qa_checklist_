<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    // public function handle(Request $request, Closure $next, $role)
    // {
    //     if (Auth::user() && Auth::user()->role !== $role) { // ใช้ Auth::user() แทน auth()->user()
    //         abort(403, 'Unauthorized'); // ถ้าผู้ใช้ไม่ใช่ admin จะถูกปฏิเสธ
    //     }

    //     return $next($request);
    // }
}
