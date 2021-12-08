<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuatarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quatars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id')->index();
            $table->unsignedBigInteger('zone_id')->index();
   
           
            $table->string('quatar_name')->nullable();
            $table->string('quatar_description')->nullable();
            $table->timestamps();
            

            $table->foreign("city_id")->references('id')->on('cities')
           // ->onDelete('restrict')->onUpdate('restrict')
            ;
            $table->foreign("zone_id")->references('id')->on('zones')
          //  ->onDelete('restrict')->onUpdate('restrict')
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
        Schema::dropIfExists('quatars');
    }
}
