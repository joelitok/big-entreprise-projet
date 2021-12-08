<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Cart;
use App\Models\Category;
use App\Models\ParametrageGramage;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
      
        
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        
      
         

        $categories=Category::orderBy('id','DESC')->where('idParent',NULL)->get();
   

         if($categories){
         foreach($categories as $category){
             $category->subcategory=Category::where('idParent',$category->id)->get();
         }
        }
        
        View::share('categories', $categories);
        View::share('products_caddy',$cart->items);
        

    }
}
