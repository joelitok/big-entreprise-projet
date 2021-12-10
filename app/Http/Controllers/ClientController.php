<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Client;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productattach;
use App\Models\Visitor;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Storage;


class ClientController extends Controller
{

    public function visitors(String $page)
    {
        //get news visitor in my website;
        $geoipInfo = geoip()->getClientIP();
        $new_visitor = new Visitor();
        $new_visitor->page = $page;
        $new_visitor->visitor_ip_address = $geoipInfo;
        $new_visitor->save();
        //get news visitor in my website;
    }

    public function home()
    {

        $this->visitors('Accueil');


        Artisan::call('storage:link');
        $sliders = Slider::orderBy('id', 'DESC')->where('slider_status', 1)->get();
        $services = Service::orderBy('id', 'DESC')->where('service_status', 1)->get();
        return view('client.home')
            ->with('sliders', $sliders)
            ->with('services', $services);
    }


    public function contact()
    {
    //    $this->visitors('contact');
        return view('client.contact');
    }


    public function services()
    {
      //  $this->visitors('services');
        $services = Service::orderBy('id', 'DESC')->where('service_status', 1)->paginate(15);

        return view('client.services')->with('services', $services);
    }

    public function detail_service($id)
    {
        $service = Service::find($id);
        $services = Service::orderBy('id', 'DESC')->where('service_status', 1)->get();
        return view('client.service_detail')
            ->with('service', $service)
            ->with('services', $services);
    }


    public function product_attaches()
    {
       // $this->visitors('Produits');
        $product_attaches = Productattach::orderBy('id', 'DESC')->where('product_attach_status', 1)->paginate(15);
        return view('client.product_attaches')->with('product_attaches', $product_attaches);
    }

    public function detail_product_attache($id)
    {
        $product_attache = Productattach::find($id);
        $product_attaches = Productattach::orderBy('id', 'DESC')->where('product_attach_status', 1)->limit(3)->get();
        return view('client.product_attache_detail')
            ->with('product_attache', $product_attache)
            ->with('product_attaches', $product_attaches);
    }


    public function about()
    {
       // $this->visitors('A propos');

        $services = Service::orderBy('id', 'DESC')->where('service_status', 1)->get();

        return view('client.about_us')->with('services', $services);;
    }

    public function blog()
    {
        return view('client.blog');
    }


    public function login2()
    {
     //   $this->visitors('connexion');
        return view('client.login2');
    }

    public function signup2()
    {
      //  $this->visitors('registrement');
        return view('client.signup2');
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
        } else if ($request->input('type') == 'admin_cost_destination') {
            $client->type = 'admin_cost_destination';
        }
        if ($request->input('type') == 'delivery_man') {
            $client->type = 'delivery_man';
        } else {
            $client->type = 'user';
        }

        $client->save();


        return back()
            ->with('status', 'Votre compte a bien été crée avec succès vous pouvez vous connecté');

        // redirect('/login2')
    }




    public function login()
    {

        return view('client.login');
    }




    public function signin_account(Request $request)
    {

        $categories = Category::orderBy('id', 'DESC')->where('category_status', 1)->get();

        $this->validate(
            $request,
            [
                'email' => 'email|required',
                'password' => 'required'
            ]
        );

        $client = Client::where('email', $request->input('email'))->first();
        if ($client) {

            if (Hash::check($request->input('password'), $client->password)) {
                if ($client->status == 0) {
                    alert()->error('Connexion échoué ', 'Votre compte à été desactivé par un administrateur  du système');
                    return back();
                }
                Session::put('client_name', $client->firstname);
                Session::put('client_email', $client->email);
                Session::put('client_type', $client->type);
                Session::put('id', $client->id);
                return redirect('/client_profile');



                return redirect('/');
            } else {
                return back()->with('statusd', 'Mauvais mot de passe ou email');
            }
        } else {
            return back()->with('statusd', 'vous n ' . "'" . ' avez pas de compte ');
        }
    }


    public function client_logout()
    {

        Auth::logout();
        if (Session::has('client_name')) {
            Session::forget('client_name');
            Session::forget('client_email');
            Session::forget('id');
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function gotoDetails($idclient)
    {
        $client = Client::findOrFail($idclient);
        return view('admin.clients.details_client', compact('client'));
    }
}
