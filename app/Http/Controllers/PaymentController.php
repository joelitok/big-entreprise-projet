<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Client;
use App\Cart;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
  //
  public function payment()
  {
    if (!Session::get('client_name')) {
      Toastr::error('Vous devez vous connectez', 'Erreur');
      return back();
    }

    if (Session::has('admin_email')) {

      $user = Client::where('email', Session::get('admin_email'))->first();
    } else if (Session::has('admin_shop_email')) {

      $user = Client::where('email', Session::get('admin_shop_email'))->first();
    } else if (Session::has('delivery_man_email')) {

      $user = Client::where('email', Session::get('delivery_man_email'))->first();
    } else if (Session::has('client_email')) {

      $user = Client::where('email', Session::get('client_email'))->first();
    } else {
      //
    }


    $products = Product::orderBy('id', 'DESC')
      ->where('product_status', 1)->get();

    return view('payment.payment')
      ->with('user', $user)
      ->with('products', $products);
  }


  public function paymentcomplete()
  {
    return view('payment.paymentcomplete');
  }
}
