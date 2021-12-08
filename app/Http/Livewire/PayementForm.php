<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\City;

use App\Models\Client;
use App\Models\Quatar;
use App\Models\Parametrage;
use App\Models\ParametrageEncombrement;
use App\Models\ParametrageGramage;
use App\Models\Zone;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;

class PayementForm extends Component
{
    public $selectedCity = 0;
    public $selectQuartier = 0;
    public $quatars = array();
    public $afficher = false;
    public $coutSup = 0;

    public function render()
    {

        // if(Session::has('client_name')){
        // Toastr::error("vous devez au préalable vous connectez  :)", 'Error');
        // return redirect()->back();

        // }


        if ($this->selectedCity > 0) {
            $this->quatars = Quatar::where('city_id', $this->selectedCity)->get();
            $this->afficher = true;
        } else {
            $this->afficher = false;
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


        $cities = City::orderBy('id', 'DESC')->get();

        //$this->deliverycost();
        return view('livewire.payement-form')
            ->with('cities', $cities)
            ->with('user', $user)->with('cities', $cities)
            ->with('quatars', $this->quatars);
    }




    public function deliverycost()
    {
        $this->coutSup = 0;
        $param = Parametrage::all()->first();
        $param_gram = ParametrageGramage::all()->first();

        if (Session::has('cart')) {
            $panier = Session::get('cart')->items;
            $poids = 0;
            $encombrement = 0;
            foreach ($panier as $item) {
                $article = Product::where('id', $item['product_id'])->first();
                if ($article ? $article->poids != null : false) {
                    $poids += $article->poids;
                }
                if ($article ? $article->encombrement != null : false) {
                    $encombrement += $article->encombrement;
                }
            }

            // si le niveau d'encombrement total des articles dépasse 50 alors on prend le niveau le plus haut en bd
            $param_encom = ParametrageEncombrement::max('categorie_encombrement');
            if ($encombrement > 50) {
                $param_encom = ParametrageEncombrement::max('categorie_encombrement');
                for ($i = 1; $i <= ($param_encom - 1); $i++) {
                    $this->coutSup += $param->suplement_encombrement;
                }
            } else {
                $param_encom = ParametrageEncombrement::where('niveau', $encombrement)->first();
                if ($param_encom) {
                    for ($i = 1; $i <= ($param_encom->categorie_encombrement - 1); $i++) {
                        $this->coutSup += $param->suplement_encombrement;
                    }
                }
            }


            //critère poids
            if ($param_gram) {
                $poids = $poids - $param_gram->gramage;
                while ($poids > $param_gram->gramage) {
                    $this->coutSup += $param->suplement_gramage;
                    $poids -= $param_gram->gramage;
                }
            }

            // critère zone
            $quartier = Quatar::find($this->selectQuartier);
            if ($quartier) {

                $zone = Zone::find($quartier->zone_id);
                if ($zone) {
                    if (!$zone->defaut) {
                        $this->coutSup += $zone->cost_delivery;
                    }
                }
            }
        }
    }
}
