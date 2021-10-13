<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RiderVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {    $role=$request->sesion()->get("ADMINROLE");
        if($role==2){
            return redirect("admin/dashboard");
        }
        return $next($request);
    }
}
