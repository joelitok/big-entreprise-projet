<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessourceRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ressource_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ressource_id')->index();
            $table->unsignedBigInteger('role_id')->index();
            $table->timestamps();

            $table->foreign("ressource_id")->references('id')->on('ressources')
            ->onDelete('cascade')->onUpdate('cascade')
            ;
            $table->foreign("role_id")->references('id')->on('roles')
            ->onDelete('cascade')->onUpdate('cascade')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ressource_role');
    }
}
