<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
          if(Auth::guest()){

            $admin = Admin::where('email', $request->domain)->first();
        }
        else{
            if(Session::has('tenant')){

                $tenant = Session::get('tenant');

            }else{

                $tenant = Tenant::where('domain', $request->domain)->first();
            }
        }
        return $next($request);
    }
}
