<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::guard('adminMiddle')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Anauthorized.', 401);
            } else {
                return redirect(url('admin/login'));
            }
        }
        return $next($request);
    }
}
