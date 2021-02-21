<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard=null)
    {
        //$guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard)
        // {
        //     if (Auth::guard($guard)->check())
        //     {
        //         return redirect(RouteServiceProvider::HOME);    
        //     }
            
            
        // } 
        // if ($guard == "admin" && Auth::guard($guard)->check()) {
              
        //     return redirect('/admin/view-products');
        // }
        //  if ($guard == "customer" && Auth::guard($guard)->check()) 
        //  {
            
        //      return redirect('/shopping-cart');
        //  }
        //dd($guard);
        if (Auth::guard($guard)->check()) 
        {
            if($guard=='admin')
                return redirect()->route('viewproducts');
            else if ($guard=='customer')
            return redirect()->route('shopping_cart');
        }
        return $next($request);
    }
}
