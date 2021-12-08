<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Client;

class AdminShopController extends Controller
{

    // évolution du status d'un produits status

    // 1 produits nom commandés 

    // 2 commandé par un clients et stocké cher l'admin et l'admin_shop.

    // 3 produits validé et envoyé cher le gestionnaire de vente l'admin_sale.

    // 4 produits déja envoyé cher le livreur. 

    // 5 produire livré


    // 0 ceci signifie que la commande a été rejetté



    public function admin_shop()
    {

        $count_orders_recieve = Order::orderBy('id', 'DESC')->get()->count();
        $count_orders_confirm = Order::orderBy('id', 'DESC')->where('order_status', 3)->get()->count();
        $count_orders_delivery = Order::orderBy('id', 'DESC')->where('order_status', 4)->get()->count();
        $count_orders_rejet = Order::orderBy('id', 'DESC')->where('order_status', 0)->get()->count();

        return view('admin_shop.admin_shop')
            ->with('count_orders_recieve', $count_orders_recieve)->with('count_orders_confirm', $count_orders_confirm)
            ->with('count_orders_delivery', $count_orders_delivery)->with('count_orders_rejet', $count_orders_rejet);;
    }


    public function orders()
    {

        $orders = Order::orderBy('id', 'DESC')->paginate(6);
        $client = Client::orderBy('id', 'DESC')->get();

        return view('admin_shop.list_orders')
            ->with('orders', $orders)->with('client', $client);
    }

    public function transferToDelivery($id)
    {
        $order = Order::find($id);
        $order->order_status = 3;
        $order->update();
        return back()->with('status', 'la commande été transferer chez le gestionnaire de vente  avec succès');
    }
}
