<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Session;

class ProfilesController extends Controller
{
    //


    public function profile()
    {
        //
        $user = Auth::user();
        return view('admin.profile', compact('user'));

        //            if (Session::has('admin_email') && Session::has('admin_type')) {
        //
        //                                    $orders=Order::orderBy('id','DESC')->where('order_user_email', Session::get('admin_email'))->paginate(3);
        //                                    $count_orders=Order::orderBy('id','DESC')->where('order_user_email',Session::get('admin_email'))->paginate(3)->count();
        //
        //                                    $products=Product::orderBy('id','DESC')->limit(3)->get();
        //                                    $admin_profiles=Client::where('type',Session::get('admin_type'))
        //                                    ->where('email',Session::get('admin_email'))->first();
        //                                    return view('admin.profile')->with('admin_profiles',$admin_profiles)
        //                                    ->with('products',$products);
        //
        //            } else if (Session::has('admin_shop_email') && Session::has('admin_shop_type')) {
        //
        //                                    $orders=Order::orderBy('id','DESC')->where('order_user_email', Session::get('admin_shop_email'))->paginate(3);
        //                                    $count_orders=Order::orderBy('id','DESC')->where('order_user_email',Session::get('admin_shop_email'))->paginate(3)->count();
        //
        //                                    $products=Product::orderBy('id','DESC')->limit(3)->get();
        //                                    $admin_shop_profiles=Client::where('type',Session::get('admin_shop_type'))
        //                                    ->where('email',Session::get('admin_shop_email'))->first();
        //                                    return view('admin_shop.profile')
        //                                    ->with('admin_shop_profiles',$admin_shop_profiles)
        //                                    ->with('products',$products);
        //
        //           } else if (Session::has('delivery_man_email') && Session::has('delivery_man_type')) {
        //
        //                                    $orders=Order::orderBy('id','DESC')->where('order_user_email', Session::get('delivery_man_email'))->paginate(3);
        //                                    $count_orders=Order::orderBy('id','DESC')->where('order_user_email',Session::get('delivery_man_email'))->paginate(3)->count();
        //
        //
        //
        //                                    $products=Product::orderBy('id','DESC')->limit(3)->get();
        //                                    $delivery_man_profiles=Client::where('type',Session::get('delivery_man_type'))
        //                                    ->where('email',Session::get('delivery_man_email'))->first();
        //                                    return view('delivery_man.profile')
        //                                    ->with('delivery_man_profiles',$delivery_man_profiles)
        //                                    ->with('products',$products);
        //
        //                                    } else if ( Session::has('client_email') && Session::has('client_type')){
        //                                        $client=Client::orderBy('id','DESC')
        //                                        ->where('email', Session::get('client_email'))->first();
        //
        //
        //                                    $orders=Order::orderBy('id','DESC')->where('order_user_email', Session::get('client_email'))->paginate(3);
        //                                    $count_orders=Order::orderBy('id','DESC')->where('order_user_email',Session::get('client_email'))->paginate(3)->count();
        //
        //                                    $products=Product::orderBy('id','DESC')->limit(3)->get();
        //                                    $user_profiles=Client::where('type',Session::get('client_type'))
        //                                    ->where('email',Session::get('client_email'))->first();
        //                                    return view('admin_space_client.profile')
        //                                    ->with('user_profiles',$user_profiles)
        //                                    ->with('products',$products)
        //                                    ->with('client',$client);
        //
        //
        //
        //             }else{
        //
        //                //
        //                print('rien ne marche');

    }
}
