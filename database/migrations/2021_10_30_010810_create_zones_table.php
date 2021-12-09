<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('city_id')->index();

            $table->string('zone_name');
            $table->string('cost_delivery')->nullable();
            $table->boolean('defaut');
            $table->string('max_time_delivery')->nullable();
            $table->timestamps();

            $table->foreign("city_id")->references('id')->on('cities')
            ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zones');
    }
}
