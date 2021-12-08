<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminSaleController extends Controller
{
    public function admin_sale()
    {
        $count_orders_recieve = Order::orderBy('id', 'DESC')->where('order_status', 2)->get()->count();
        $count_orders_confirm = Order::orderBy('id', 'DESC')->where('order_status', 3)->get()->count();
        $count_orders_delivery = Order::orderBy('id', 'DESC')->where('order_status', 4)->get()->count();
        $count_orders_rejet = Order::orderBy('id', 'DESC')->where('order_status', 0)->get()->count();

        return view('admin_sales.admin_sale')
            ->with('count_orders_recieve', $count_orders_recieve)->with('count_orders_confirm', $count_orders_confirm)
            ->with('count_orders_delivery', $count_orders_delivery)->with('count_orders_rejet', $count_orders_rejet);
    }


    public function list_orders()
    {
        $orders = Order::orderBy('id', 'DESC')
            ->where('order_status', 3)
            ->orWhere('order_status', 4)
            ->orWhere('order_status', 5)
            ->orWhere('order_status', 0)
            ->paginate(3);
        //deserialiser le caddy pour affcher l ensemble de ces elements.
        $orders->transform(function ($order, $key) {
            $order->caddy = unserialize($order->caddy);
            return $order;
        });


        return view('admin_sales.list_orders')
            ->with('orders', $orders);
    }

    public function order_detail()
    {
        print('detail des commandes');
    }

    public function admin_sale_profile()
    {
        return view('admin_sales.admin_sale');
    }

    public function transferToDelivery($id)
    {
        $order = Order::find($id);
        $order->order_status = 4;
        $order->update();
        return back()->with('status', 'la commande a été livré avec succès');
    }
}
