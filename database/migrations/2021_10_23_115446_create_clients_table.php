<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            

// =======  
            $table->id();
            $table->string('firstname');//nom
            $table->string('lastname')->nullable();//prenom
            $table->string('email')->unique();
            $table->string('numero')->unique();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('password');
            $table->string('status');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
