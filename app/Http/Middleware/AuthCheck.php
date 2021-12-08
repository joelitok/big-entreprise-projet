<?php

namespace App\Http\Middleware;

use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AuthCheck
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
        $isAuthenticated=Auth::check();
        
        if(!$isAuthenticated){
        
           Toastr::error('Vous devez au préalable vous connectez', 'Error');
           return  redirect('/login');
        
        }
            // if(session()->has('LoggedUser') && ($request->path() == 'auth/login' || $request->path() == 'auth/register' ) ){
             //     return back();
                // }


    // /add_to_caddy/{id}
    //  /caddy
 
    //  /delete_product_to_caddy/{id}
 
    // /update_quantity_product/{id}


// if((
// !Session::has('admin_name')||
// !Session::has('admin_shop_name')||
// !Session::has('admin_cost_destination_name')||
// !Session::has('delivery_man_name')||
// !Session::has('client_name')) 
// && ($request->is('add_to_caddy/*')||$request->is('caddy/*')
// ||$request->is('delete_product_to_caddy/*')
// ||$request->is('update_quantity_product/*'))){
// alert()->error('Connectez vous','Vous devez vous connectez avant de continuer');  
// return back();
// }






         return $next($request)/*->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT')*/;
    }
        
        

    
}
