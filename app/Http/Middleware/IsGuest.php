<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsGuest
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
        // Kondisi jika tidak ada admin yang login
        if (!Auth::guard('admin')->check()) {
            return $next($request);
        }

        return redirect()->route('dashboard.index');
    }
}
