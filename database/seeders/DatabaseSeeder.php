<?php

namespace Database\Seeders;

use App\Models\Ressource;
use App\Models\RessourceRole;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        RessourceSeeder::class;
        RoleSeeder::class;

        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(60)->create();
        \App\Models\Category::factory(2)->create();
        \App\Models\Service::factory(10)->create();
        \App\Models\Slider::factory(6)->create();
        \App\Models\Client::factory(10)->create();

        //creation des roles et ressources
        //creation egalement du user par defaut







    }
}
