<?php

namespace App\Http\Controllers;

use App\enums\RoleEnums;
use App\Models\ParametrageEncombrement;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Visitor;
use App\Models\Zone;
use App\Models\City;
use App\Models\Order;
use App\Models\Quatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


use App\Models\NewsLetter;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{

    public function admin_profile()
    {
        return view('admin.profile');
    }


    //commencer par compter les utilisateur du systeme
    public function admin()
    {
        $user = Auth::user();

        $roles = $user->roles;
        $ress = array();
        foreach ($roles as $role) {
            foreach ($role->ressources as $res) {
                $ress[] = $res->name;
            }
        }
        Session::put('user_ressources', $ress);

        $count_client = Client::all()->count();
        $count_order = Order::get()->count();
        $count_delivery_man = 0;
        $count_admin = 0;
        $count_admin_shop = 0;
        $count_admin_cost_destination = 0;
        $all_user = User::all();
        foreach ($all_user as $one) {
            foreach ($one->roles as $role) {
                if ($role->name == RoleEnums::ADMIN) {
                    $count_admin++;
                } else if ($role->name == RoleEnums::ADMINSHOP) {
                    $count_admin_shop++;
                } else if ($role->name == RoleEnums::DELIVERYMAN) {
                    $count_delivery_man++;
                }
            }
        }


        //compter les produire
        $count_product = Product::get()->count();

        //compter les services
        $count_service = Service::get()->count();
        $services = Service::orderBy('id', 'DESC')->limit(3)->get();
        $count_visitors = Visitor::get()->count();
        $count_visitors_shop = Visitor::where('page', 'Boutique')->count();
        $count_visitors_home = Visitor::where('page', 'Accueil')->count();
        return view('admin.admin')
            ->with('count_client', $count_client)
            ->with('count_delivery_man', $count_delivery_man)
            ->with('count_admin', $count_admin)
            ->with('count_admin_shop', $count_admin_shop)
            ->with('count_admin_cost_destination', $count_admin_cost_destination)
            ->with('count_product', $count_product)
            ->with('count_service', $count_service)
            ->with('count_order', $count_order)
            ->with('user', $user)
            ->with('services', $services)
            ->with('count_visitors', $count_visitors)
            ->with('count_visitors_shop', $count_visitors_shop)
            ->with('count_visitors_home', $count_visitors_home)
            ->with('message', 'Data added Successfully');
    }


    //récupérer tous les clients de ma base de données
    public function client_list()
    {
        $clients = Client::orderBy('id', 'DESC')->paginate(4);
        return view('admin.clients.listClient')->with('clients', $clients);
    }

    public function client_add()
    {
        return view('admin.clients.addClient');
    }


    public function desactiverclient($id)
    {
        $client = Client::find($id);
        $client->status = 0;
        $client->update();
        return redirect('/client_list')
            ->with('status', 'le client a été désactiver   avec succès');
    }


    public function activerclient($id)
    {
        $client = client::find($id);
        $client->status = 1;
        $client->update();
        return redirect('/client_list')
            ->with('status', 'le client a été activer  avec succès');
    }

    public function activeruser($id)
    {
        $client = User::find($id);
        $client->status = 1;
        $client->update();
        return redirect()->back()
            ->with('status', 'le client a été désactiver   avec succès');
    }
    public function desactiveruser($id)
    {
        $client = User::find($id);
        $client->status = 0;
        $client->update();
        return redirect()->back()
            ->with('status', 'le client a été désactiver   avec succès');
    }


    public function delete_client($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('/client_list')
            ->with('status', 'le client a été supprimer avec succès');
    }

    public function delete_user($id)
    {
        $user_role_u = RoleUser::where('user_id', $id)->first();
        if ($user_role_u) {
            $user_role_u->delete();
        } else {
            //
        }

        $user_role = Role::where('id', $id)->first();
        if ($user_role) {
            $user_role->delete();
        } else {
        }

        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        return redirect()->back()
            ->with('status', 'le client a été supprimer avec succès');
    }


    public function add_account(Request $request)
    {

        $categories = Category::orderBy('id', 'DESC')->where('category_status', 1)->get();

        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'email|required|unique:clients',
            'phone' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'password' => 'required|min:4',

        ]);

        $client = new Client();
        $client->firstname = $request->input('firstname');
        $client->lastname = $request->input('lastname');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->gender = $request->input('gender');
        $client->city = $request->input('city');
        $client->password = bcrypt($request->input('password'));
        $client->status = 1;

        if ($request->input('type') == 'admin') {
            $client->type = 'admin';
        } else if ($request->input('type') == 'admin_shop') {
            $client->type = 'admin_shop';
        } else {
            $client->type = 'user';
        }


        $client->save();

        return redirect('/client_add')
            ->with('status', 'Votre compte a bien été crée avec succès vous pouvez vous connecté');
    }

    public function list_order()
    {
        $orders = Order::orderBy('id', 'DESC')->paginate(6);
        $client = Client::get();
        return view('admin.list_orders')
            ->with('orders', $orders)->with('client', $client);
    }

    public function transferToDelivery($id)
    {
        $order = Order::find($id);
        $order->order_status = 3;
        $order->update();
        return back()->with('status', 'la commande été transferer chez le gestionnaire de vente  avec succès');
    }


    public function product_add()
    {
        $categories = Category::orderBy('id', 'DESC')->where('category_status', 1)->get();
        $niveaux = ParametrageEncombrement::all();
        return view('admin.product.add_product')->with('categories', $categories)->with('niveaux', $niveaux);
    }


    //enregistrer un products dans ma base de donnée
    public function product_add_save(Request $request)
    {


        //start send newsletter  
        if ($request->input('newsletter')) {
            $product = Product::latest()->first();
            //Send mail to admin

            Mail::send(
                'newsletter',
                array(
                    'product_price' => $product->product_price,
                    'product_name' => $product->product_name,
                    'product_description' => $product->product_description,
                    'product_category' => $product->product_category,
                    'product_image' => $product->product_image,
                    'stock' => $product->stock,

                ),

                function ($message) use ($request) {
                    $newsletter_email = NewsLetter::where('email_status', 1)->get();
                    $message->from('joelnkouatchet@gmail.com');
                    foreach ($newsletter_email as $email) {
                        $message->to($email->email, 'User')
                            ->subject('Les nouvelles a propos des nouveaux produits');
                    }
                }
            );
        }
        // end send newsletter








        $this->validate(
            $request,
            [
                'product_price' => 'required',
                'product_name' => 'required',
                'product_description' => 'required',
                'product_category' => 'required',
                'product_image' => 'required',
                'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]
        );



        if ($request->hasFile('product_image')) {
            //1 get file name with extension

            foreach ($request->file('product_image') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/public_images/', $name);
                $data[] = $name;
            }


            //$fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2 file name without extension

            // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            /// $extension = $request->file('product_image')->getClientOriginalExtension();

            //4 renamane image to store
            // $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            // $path = $request->file('product_image')->storeAs('public/product_images',
            //  $fileNameToStore);


        } else {
            ///  $fileNameToStore = 'noimage.jpg';
            $data = '["noimage.jpg"]';
        }

        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->poids = $request->input('poids');
        $product->stock = $request->input('stock');
        $product->stock_min = $request->input('stock_min');
        $product->encombrement = $request->input('encombrement');
        $product->reference = $request->input('reference');
        $product->product_image = json_encode($data);
        $product->product_status = 1;

        if ($product->encombrement < 0 || $product->encombrement > 10) {
            Toastr::warning("Le niveau d'encombrement doit être compris entre 0 et 10 :)", 'Warning');
            return redirect('product_add_a');
        } else {
            $product->save();
            Toastr::success("le product ' . $product->product_name . ' a été ajouter avec succes :)", 'Success');
            return redirect()->back();
        }
    }

    //récupérer tous les products de ma base de données
    public function list_product()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(6);
        $categories = Category::orderBy('id', 'DESC')->where('category_status', 1)->get();
        return view('admin.product.list_product')->with('products', $products)->with('categories', $categories);
    }


    public function desactiverproduct($id)
    {
        $product = Product::find($id);
        $product->product_status = 0;
        $product->update();
        Toastr::success("Le product a été désactiver avec succès :)", 'Warning');
        return back();
    }


    public function activerproduct($id)
    {
        $product = Product::find($id);
        $product->product_status = 1;
        $product->update();
        Toastr::success("Le product a été activer  avec succès :)", 'success');
        return back();
    }


    public function delete_product($id)
    {
        $product = Product::find($id);
        if ($product->product_image != 'noimage.jpg') {
            foreach (json_decode($product->product_image) as $img) {
                Storage::delete('/public_images/' . $img);
            }
        }
        $product->delete();

        Toastr::success("Le product a été supprimer avec succès :)", 'success');
        return back();
    }


    public function product_update_save($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('id', 'DESC')->where('category_status', 1)->get();
        $niveaux = ParametrageEncombrement::all();
        return view('admin.product.update_product')
            ->with('product', $product)->with('categories', $categories)->with('niveaux', $niveaux);
    }


    public function product_update_save_action(Request $request)
    {
        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->product_category = $request->input('product_category');
        $product->product_price = $request->input('product_price');


        $this->validate(
            $request,
            [
                'product_name' => 'required',
                'product_description' => 'required',
                'product_category' => 'required',
                'product_price' => 'required',
                'product_image' => 'image| nullable|max:19990'
            ]
        );


        if ($request->hasFile('product_image')) {
            //1 get file name with extension
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            //2 file name without extension

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3 get extension
            $extension = $request->file('product_image')->getClientOriginalExtension();

            //4 renamane image to store
            $fileNameToStore = $fileName . '_' . time() . '' . $extension;

            $path = $request->file('product_image')->move(
                public_path() .
                    '/product_images',
                $fileNameToStore
            );

            if ($product->product_image != 'noimage.jpg') {
                Storage::delete('public/product_images/' . $product->image);
            }
            $product->product_image = $fileNameToStore;
        }
        $product->poids = $request->input('poids');
        $product->stock = $request->input('stock');
        $product->stock_min = $request->input('stock_min');
        $product->encombrement = $request->input('encombrement');

        $product->update();
        Toastr::success("Le product a été modifier avec succès :)", 'success');
        return redirect('/list_product_a');
    }


    //------------------------------------------pour la gestion des zone de livraison-----------------------
    public function zone_add_save(Request $request)
    {


        $this->validate(
            $request,
            [
                'zone_name' => 'required|unique:zones'
            ]
        );
        //insertion des zones de destination
        $zone = new Zone();
        $zone->zone_name = $request->input('zone_name');
        $zone->city_id = $request->input('city_id');

        $zone->cost_delivery = $request->input('cost_delivery');
        $zone->max_time_delivery = $request->input('max_time_delivery');

        $exit = Zone::where("zone_name", $zone->zone_name)->first();
        if (!$exit) {
            if ($request['default']) {
                $other = Zone::where('defaut', true)->first();
                // on change la zone par defaut
                if ($other) {
                    $other->defaut = false;
                    $other->updated_at = now();
                    $other->save();
                }
                $zone->defaut = true;
            } else {
                $zone->defaut = false;
            }
            $zone->save();
            Toastr::success("La zone a bien été ajoutée :)", 'success');
        } else {
            Toastr::error("Une zone existe déjà avec ce nom ", 'Error');
        }

        return redirect()->back();
    }


    public function list_zone()
    {
        $zones = Zone::orderBy('id', 'DESC')->get();
        $cities = City::orderBy('id', 'DESC')->get();
        return view('admin.delivery_zone.list_zone')
            ->with('zones', $zones)->with('cities', $cities);
    }


    public function delete_zone($id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        Toastr::success("La zone a été supprimer avec succès :)", 'success');
        return back();
    }

    public function zone_add()
    {
        return view('admin.delivery_zone.add_zone');
    }

    //---------------------------- fin de  la gestion des zones de livraisons----------


    //------------------------------------------pour la  gestion des ville de livraison-----
    public function city_add_save(Request $request)
    {



        //insertion des villes de destination
        $city = new City();
        $city->city_name = $request->input('city_name');
        $check_city_nam = City::where('city_name', '=', $request->input('city_name'))->exists();

        if ($check_city_nam) {
            Toastr::error("Cet element existe déja dans la base de donnés");
            return back();
        } else {
            $city->save();
        }

        Toastr::success("La ville' . $city->city_name . ' a été ajouter avec succes :)", 'success');
        return redirect('/list_city');
    }


    public function list_city()
    {
        $cities = City::orderBy('id', 'DESC')->get();
        return view('admin.delivery_city.list_city')
            ->with('cities', $cities);
    }


    public function delete_city($id)
    {

        $city = City::find($id);
        $city->delete();
        Toastr::success("La ville a été supprimer avec succès :)", 'success');
        return back();
    }

    //-------------------------------------------fin de la gestion des villes de livraison-------------


    //--------------------------------------------debut de la gestion des quatier--------------
    public function quatar_add_save(Request $request)
    {

        $this->validate(
            $request,
            [
                'quatar_name' => 'required|unique:quatars',
                'quatar_description' => 'required',
            ]
        );

        //insertion des villes de destination
        $quatar = new Quatar();
        $quatar->quatar_name = $request->input('quatar_name');
        $quatar->quatar_description = $request->input('quatar_description');
        $quatar->city_id = $request->input('city_id');
        $quatar->zone_id = $request->input('zone_id');

        $exit = Quatar::where("quatar_name", $request->input('quatar_name'))->first();
        if ($exit) {
            Toastr::error(". $quatar->quatar_name. ' existe déja :) ", 'Error');
            return redirect()->back();
        }


        $quatar->save();
        Toastr::success("Le qaurtier' . $quatar->quatar_name. ' a été ajouter avec succes :)", 'success');
        return redirect('/list_quatar');
    }


    public function list_quatar()
    {
        $zones = Zone::orderBy('id', 'DESC')->get();
        $cities = City::orderBy('id', 'DESC')->get();
        $quatars = Quatar::orderBy('id', 'DESC')->get();
        return view('admin.delivery_quatar.list_quatar')
            ->with('cities', $cities)->with('zones', $zones)
            ->with('quatars', $quatars);
    }


    public function delete_quatar($id)
    {

        $quatar = Quatar::findOrFail($id);
        $quatar->delete();
        Toastr::success("Le quartier a été supprimer avec succès :)", 'success');
        return back();
    }


    //------------------------------------------fin de la gestion des quartier--------------
}
