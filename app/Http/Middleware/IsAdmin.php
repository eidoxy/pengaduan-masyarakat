<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kondisi jika yang login admin dengan level admin
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->level == 'admin') {
            return $next($request);
        }

        return redirect()->route('admin.formLogin');
    }
}
