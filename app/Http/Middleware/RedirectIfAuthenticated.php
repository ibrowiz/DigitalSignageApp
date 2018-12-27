<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Scopes\Facade\TenantManagerFacade as TenantManager;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
            $tenant = null;

        switch($guard){

             case  'operator';
            if (Auth::guard($guard)->check()){
                //return redirect()->route('operator.dashboard');
                $tenant = TenantManager::get();

                //$domain = Auth::guard('operator')->user()->tenant->domain;
                return redirect('mediapartner/'.$tenant->domain.'/dashboard');
            }
            break;

            case  'admin';
            if (Auth::guard($guard)->check()){
                return redirect()->route('admin.dashboard');
            }
            break;

          default:
          if (Auth::guard($guard)->check()) {
            $tenant = TenantManager::get();
            return redirect('client/'.$tenant->domain.'/dashboard');
        }
          break;

        }
     

        return $next($request);
    }
}
