<?php

namespace Database\Seeders;

use App\Models\Ressource;
use App\Models\RessourceRole;
use Illuminate\Database\Seeder;

class RessourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res = new Ressource();
        $res->name = "liste service";
        $res->save();

        $res = new Ressource();
        $res->name = "liste slider";
        $res->save();

        $res = new Ressource();
        $res->name = "liste client";
        $res->save();

        $res = new Ressource();
        $res->name = "liste categories";
        $res->save();

        $res = new Ressource();
        $res->name = "liste article";
        $res->save();

        $res = new Ressource();
        $res->name = "liste produit";
        $res->save();

        $res = new Ressource();
        $res->name = "liste zone";
        $res->save();

        $res = new Ressource();
        $res->name = "liste villes";
        $res->save();

        $res = new Ressource();
        $res->name = "liste commandes";
        $res->save();

        $res = new Ressource();
        $res->name = "liste quatiers";
        $res->save();

        $res = new Ressource();
        $res->name = "Valider commandes"; // pour l'administrateur qui valide la commande
        $res->save();

        $res = new Ressource();
        $res->name = "Preparer commande"; // pouvoir faire passer la commande de valider à encour de livraison
        $res->save();

        $res = new Ressource();
        $res->name = "Livrer commande"; // pour le livreur qui effectue la commande
        $res->save();

        $res = new Ressource();
        $res->name = "liste users"; // pour  liste utiliseteur
        $res->save();
        $res = new Ressource();
        $res->name = "cout supplementaire"; // pour  liste utiliseteur
        $res->save();

        $res = new Ressource();
        $res->name = "newsletters"; // pour  liste utiliseteur
        $res->save();

        $res = new Ressource();
        $res->name = "visites"; // pour  liste utiliseteur
        $res->save();



        //on attribue toutes les ressources à l'admin
        $res = Ressource::all();
        if ($res) {
            foreach ($res as $re) {
                $resRole = new RessourceRole();
                $resRole->role_id = 1;
                $resRole->ressource_id = $re->id;
                $resRole->save();
            }
        }


    }
}
