<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role1, $role2 = null)
    {
        $roles = collect([$role1, $role2]);
        if ($roles->contains(Auth::user()->role)) {
            return $next($request);
        }

        return redirect(route('phones.index'));
        /* return response()->view('errors.check-permission'); */
    }
}
