<?php

namespace App\Http\Middleware;

use Closure;

class CheckId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (isset($request->role) && false == is_numeric($request->role)) {
            return response('Это не число - ' . $request->role);
        }
        if (isset($request->boss) && false == is_numeric($request->boss)) {
            return response('Это не число - ' . $request->boss);
        }
        if (isset($request->inviteBoss) && false == is_numeric($request->inviteBoss)) {
            return response('Это не число - ' . $request->inviteBoss);
        }
        if (isset($request->colleague) && false == is_numeric($request->colleague)) {
            return response('Это не число - ' . $request->colleague);
        }        
        return $next($request);
    }
}
