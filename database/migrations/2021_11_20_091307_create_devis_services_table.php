<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("service_id")->index();
            $table->string('champ_name');
            $table->string('champ_type');
            $table->string('valeur')->nullable();
            $table->timestamps();

        
            $table->foreign("service_id")->references('id')->on('services')
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
        Schema::dropIfExists('devis_services');
    }
}
