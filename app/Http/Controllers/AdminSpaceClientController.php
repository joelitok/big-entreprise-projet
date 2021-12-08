<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use App\enums\RoleEnums;
use App\Models\Product;
use App\Models\Category;
use App\Cart;
use App\Models\Order;
use App\Models\Client;
use Illuminate\Support\Facades\Session;

class AdminSpaceClientController extends Controller
{



  public function client_profile()
  {

    if (!Session::has('client_name')) {
      Toastr::error("Vous dévez au préalable vous connectez :)", 'Error');
      return redirect('/login2');
    }


    $client = Client::orderBy('id', 'DESC')->where('id', Session::get('id'))->first();
    return view('admin_space_client.profile')->with('client', $client);
  }

  public function history_order()
  {
    if (!Session::has('client_name')) {
      Toastr::error("Vous dévez au préalable vous connectez :)", 'Error');
      return redirect()->back();
    }

    $orders = Order::orderBy('id', 'DESC')->where('client_id', Session::get('id'))->paginate(6);
    $count_orders = Order::orderBy('id', 'DESC')->where('client_id', Session::get('id'))->paginate(6)->count();
    return view('admin_space_client.history_order')->with('orders', $orders)->with('count_orders', $count_orders);
  }




  public function order_facture()
  {

    if (!Session::has('client_name')) {
      Toastr::error("Vous dévez au préalable vous connectez :)", 'Error');
      return redirect()->back();
    }

    $orders = Order::orderBy('id', 'DESC')->where('client_id', Session::get('id'))->paginate(6);
    $count_orders = Order::orderBy('id', 'DESC')->where('client_id', Session::get('id'))->paginate(6)->count();
    return view('admin_space_client.order_facture')->with('orders', $orders)->with('count_orders', $count_orders);
  }


  public function order_tracker()
  {
    if (!Session::has('client_name')) {
      Toastr::error("Vous dévez au préalable vous connectez :)", 'Error');
      return redirect()->back();
    }

    $count_order_recieve = Order::orderBy('id', 'DESC')
      ->where('client_id', Session::get('id'))
      ->where('order_status', RoleEnums::ENATTENTE)->get()->count();

    $count_order_confirm = Order::orderBy('id', 'DESC')
      ->where('client_id', Session::get('id'))
      ->where('order_status', RoleEnums::VALIDER)->get()->count();

    $count_order_pending = Order::orderBy('id', 'DESC')
      ->where('client_id', Session::get('id'))
      ->where('order_status', RoleEnums::ENCOURS)->get()->count();

    $count_order_delivery = Order::orderBy('id', 'DESC')
      ->where('client_id', RoleEnums::LIVRER)->get()->count();

    $count_order_rejet = Order::orderBy('id', 'DESC')
      ->where('client_id', Session::get('id'))
      ->where('order_status', RoleEnums::REJETTER)->get()->count();

    return view('admin_space_client.order_tracker')
      ->with('count_order_recieve', $count_order_recieve)->with('count_order_confirm', $count_order_confirm)
      ->with('count_order_delivery', $count_order_delivery)->with('count_order_pending', $count_order_pending)
      ->with('count_order_rejet', $count_order_rejet);
  }

  public function my_order()
  {
    if (!Session::has('client_name')) {
      Toastr::error("Vous dévez au préalable vous connectez :)", 'Error');
      return redirect()->back();
    }
    $orders = Order::orderBy('id', 'DESC')->where('client_id', Session::get('id'))->paginate(6);
    $count_orders = Order::orderBy('id', 'DESC')->where('client_id', Session::get('id'))->count();
    $client = Client::orderBy('id', 'DESC')->where('id', Session::get('id'))->get();
    return view('admin_space_client.my_order')
      ->with('orders', $orders)
      ->with('count_orders', $count_orders)
      ->with('client', $client);
  }
}
