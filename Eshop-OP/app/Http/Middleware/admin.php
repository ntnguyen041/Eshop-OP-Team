<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admin
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
        // return $next($request);
        // if($request->session()->exists("admin"))
        // return redirect()->route('home');
        // if(!$this->isAdmin()){
        //     return redirect(round('home'));
        // }
        // return $next($request);
    //    return session()->get("admin");
        // echo session()->get("admin");
        // session()->flush();
        if(session()->get("admin")==1)
            return $next($request);
        return redirect()->route('home');
    }
    public function isAdmin(){
        if($request->session()->exists("admin")){
            return true;
        }
        return false;
        
    }

}
