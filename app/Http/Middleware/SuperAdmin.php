<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            return redirect("/");
        }
        $user = Auth::user();
        if($user==1){
            return $next($request);
        }
        if($user==2){
            return redirect("/admin");
        }
        if($user==3){
            return redirect("/dephead");
        }
        if($user==4){
            return redirect("/staff");
        }
        if($user==5){
            return redirect("/client");
        }
    }
}
