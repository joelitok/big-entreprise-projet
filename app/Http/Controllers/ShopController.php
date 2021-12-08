<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

use App\Cart;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    //
    public  $showbanner = true;

    public function shop(Request $request)
    {



        $categories = Category::orderBy('id', 'DESC')->where('idParent', NULL)->get();


        if ($categories) {
            foreach ($categories as $category) {
                $category->subcategory = Category::where('idParent', $category->id)->get();
            }
        }

        $products = Product::orderBy('id', 'DESC')->where('product_status', 1)->get();

        //récuperation du price maximale
        $max_price = 0;
        $max_price = Product::orderBy('id', 'DESC')->where('product_status', 1)->max('product_price');

        //product in cart
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        //end                   
        if ($request->is('shop')) {
            return  view('admin_shop.client_shop', ['products_caddy' => $cart->items])
                ->with('products', $products)->with('categories', $categories);
        } else {
            return  view('admin_shop.client_shop_full', ['products_caddy' => $cart->items])
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('showbanner', $this->showbanner)
                ->with('max_price', $max_price);
        }
        // back()->with('products',$products)
        // ->with('categories', $categories)->with('products_caddy', $cart->items);




    }

    // public function shop_full($id=null){
    //                     if($id){
    //                     $products=Product::orderBy('id','DESC')->where('product_status',1)->limit($id)->get();
    //                     $categories=Category::orderBy('id','DESC')->where('idParent',NULL)->get();
    //                     } else {
    //                     $products=Product::orderBy('id','DESC')->where('product_status',1)->get();
    //                     $categories=Category::orderBy('id','DESC')->where('idParent',NULL)->get();
    //                         }

    //                     //product in cart
    //                     $oldCart = Session::has('cart')? Session::get('cart'):null;
    //                     $cart = new Cart($oldCart);
    //                     //end

    //                     return view('admin_shop.client_shop_full', ['products_caddy' => $cart->items])
    //                     ->with('products',$products)->with('categories', $categories);

    //     }


    public function add_product_to_caddy(Request $request, $id)
    {
        //j'ai besoin de la categories et du produire etant données que je retoure la vue client shop
        $categories = Category::orderBy('id', 'DESC')
            ->where('idParent', NULL)->get();
        $products = Product::orderBy('id', 'DESC')
            ->where('product_status', 1)->get();
        // fin

        //product in cart
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        //end


        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);


        return
            redirect()->back()
            ->with('categories', $categories)
            ->with('products_caddy', $cart->items)
            ->with('products', $products);

        // view('admin_shop.client_shop', ['products_caddy' => $cart->items])
        //  ->with('categories',$categories)
        //  ->with('products',$products);

    }







    public function caddy()
    {
        if (!Session::has('cart')) {
            Toastr::error('Aucun élement ajouté dans le panier', 'Erreur');
            return back();
        }

        $categories = Category::orderBy('id', 'DESC')->where('idParent', NULL)->get();
        $products = Product::orderBy('id', 'DESC')->where('product_status', 1)->get();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        return view('admin_shop.caddy', ['products_caddy' => $cart->items])
            ->with('categories', $categories)->with('products', $products);
    }


    public function update_quantity_product($id, Request $request)
    {


        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $product = Product::find($id);

        //ici ajoute d'abord le produire dans le panier avant de modifier sa quantité
        $cart->add($product, $id);


        $cart->updateQty($id, $request->quantity);
        Session::put('cart', $cart);
        //dd(Session::get('cart'));
        return redirect()->back();
    }


    public function delete_product_to_caddy(Request $request,  $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }


        //dd(Session::get('cart'));
        // if ($request->is('caddy')) {
        //     return back(); 
        // }else{
        //     return back();   
        // }
        return back();
    }



    public function select_by_category($category_name)
    {

        if ($category_name) {
            $this->showbanner = false;
        }

        //product in cart
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        //end

        $categories = Category::orderBy('id', 'DESC')->where('idParent', NULL)->get();

        if ($categories) {
            foreach ($categories as $category) {
                $category->subcategory = Category::where('idParent', $category->id)->get();
            }
        }

        $products = Product::orderBy('id', 'DESC')
            ->where('product_category', $category_name)
            ->where('product_status', 1)->get();

        return

            view(
                'admin_shop.client_shop_full',
                ['products_caddy' => $cart->items]
            )
            ->with('products', $products)->with('showbanner', $this->showbanner)
            ->with('categories', $categories);
    }



    public function detail_product($id)
    {
        $product = Product::find($id);

        //product in cart
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        //end
        $categories = Category::orderBy('id', 'DESC')->where('idParent', NULL)->get();
        $products = Product::orderBy('id', 'DESC')->where('product_status', 1)->get();
        return view('admin_shop.client_detail_shop', ['products_caddy' => $cart->items])
            ->with('categories', $categories)->with('product', $product)->with('products', $products);
    }



    public function search_product(Request $request)
    {

        $categories = Category::orderBy('id', 'DESC')->where('idParent', NULL)->get();
        //$products=Product::orderBy('id','DESC')->where('product_status',1)->get();

        //product in cart
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        //end
        $search = $request->get('search');
        // dd($search);
        $products = Product::where('product_name', 'like', '%' . $search . '%')
            ->orWhere('product_description', 'like', '%' . $search . '%')
            ->orWhere('product_category', 'like', '%' . $search . '%')->orderBy('id', 'DESC')->paginate(8);

        return  view('admin_shop.search', ['products_caddy' => $cart->items])
            ->with('products', $products)->with('categories', $categories);
    }
}
