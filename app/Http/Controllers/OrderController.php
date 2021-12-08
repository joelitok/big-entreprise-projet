<?php

namespace App\Http\Controllers;

use App\enums\RoleEnums;
use App\Models\Validation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use App\Models\Caddy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\File;
use App\Cart;

class OrderController extends Controller
{
    //enregistrer un orders dans ma base de donnée
    public function payment_order_save(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        if (Session::has('admin_name')) {
            $user_name = Session::get('admin_name');
            $user_email = Session::get('admin_email');
            $user = Client::where('email', $user_email)->first();
            if ($user) {
                $user->phone;
                $user->city;
            }

        } else if (Session::has('admin_shop_name')) {
            $user_name = Session::get('admin_shop_name');
            $user_email = Session::get('admin_shop_email');
            $user = Client::where('email', $user_email)->first();
            if ($user) {
                $user->phone;
                $user->city;
            }
        } else if (Session::has('delivery_man_name')) {
            $user_name = Session::get('delivery_man_name');
            $user_email = Session::get('delivery_man_email');
            $user = Client::where('email', $user_email)->first();
            if ($user) {
                $user->phone;
                $user->city;
            }
        } else {
            $user_name = Session::get('client_name');
            $user_email = Session::get('client_email');
            $user = Client::where('email', $user_email)->first();
            if ($user) {
                $user->phone;
                $user->city;
            }
        }


        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $order = new Order();
        $order->client_id = Session::has('id') ? Session::get('id') : null;
        $order->order_status = RoleEnums::ENATTENTE;

        $order->numero = rand(0, 99999) . '#Secu';
        $order->anotherDay = $request->input('anotherDay');
        //$order->hour = $request->input('hour');
        $order->quatar_id = $request->input('quatar_id');
        $order->city_id = $request->input('city_id');
        //dd($request->input('city'));
        $order->anothernumber = $request->input('anothernumber');

       
        $order->save();


        foreach ($cart->items as $cad) {
            $caddy = new Caddy();
            $caddy->product_id = $cad['product_id'];
            $caddy->order_id = $order->id;
            $caddy->quantite = $cad['qty'];
            $caddy->total_price = $cad['product_price'] * $cad['qty'];

            $caddy->save();

        }

        Session::forget('cart');
        return redirect('/payment-complete');

    }

    public function changeStatutCommande(Request $request)
    {

        try {
            $order = Order::find($request['idCommande'])->first();
            $statut = $request['statut'];
            if ($order) {
                switch ($statut) {
                    case 1:
                        $order->order_status = RoleEnums::VALIDER;
                        break;
                    case 2:
                        $order->order_status = RoleEnums::ENCOURS;
                        break;
                    case 3:
                        $order->order_status = RoleEnums::LIVRER;
                        break;
                    default:
                        $order->order_status = RoleEnums::ENATTENTE;
                }
                $order->updated_at = now();
                $order->save();

                // on creer une nouvelle ligne de validation
                $validation = new Validation();
                $validation->user_id = Auth::id();
                $validation->order_id = $order->id;
                $validation->status = $statut;
                $validation->save();
                Toastr::success("La facture a bien été modifiée ! ", "Succes");

            }
        } catch (\Exception $e) {
            Toastr::error("Une erreur est survenue lors de la modification de la facture ! $e", "Echec");
        }
        return redirect()->back();
    }

    public function gotoAddImage($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('admin.add_order_bill', compact('order'));
    }

    public function storeImage(Request $request)
    {
        $img = $request['image'];
        $order = Order::findOrFail($request['order_id']);
       // $folderPath = "public/facture_images/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
       // $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        Storage::disk('local')->put('public/facture_images/image' . $order->id . '.png', $image_base64);
        $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();



        $order->image_facture = $storagePath.'image' . $order->id . '.png';
        $order->updated_at = now();
        $order->save();
        Toastr::success("Photo Ajouter avec succès", "Success");
        return redirect('list_order_a');
    }


}



















