<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminVerify
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
        
       $AdminRole=$request->session()->get('ADMINROLE');
         if($AdminRole!=0){
             return redirect("admin/dashboard");
         }
        return $next($request);
    }
}
