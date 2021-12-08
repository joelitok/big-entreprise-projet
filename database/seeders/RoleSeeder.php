<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "Admin";
        $role->save();

        $role = new Role();
        $role->name = "Livreur";
        $role->save();

        $role = new Role();
        $role->name = "Admin shop";
        $role->save();

        $role = new Role();
        $role->name = "Gestionnaire";
        $role->save();


        //creation du user par defaut
        $user = new User();
        $user->email = "admin@gmail.com";
        $user->firstname = "Admin";
        $user->password = Hash::make("admin");
        $user->lastname = "admin";
        $user->save();


        // on attribue le role admin
        $userRole = new RoleUser();
        $userRole->user_id = $user->id;
        $userRole->role_id = 1;
        $userRole->save();
    }
}
