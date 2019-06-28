<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ( ( $role == 'all' ) and ( $request->user()->isValidated() ) ) {
            return $next($request);
        }

        if ( !$request->user()->isValidated() ) {
            return redirect()->route('wait');
        }

        if ( !( $request->user()->isRole($role) ) ) {
            return redirect('/');
        }

        return $next($request);
    }
}
