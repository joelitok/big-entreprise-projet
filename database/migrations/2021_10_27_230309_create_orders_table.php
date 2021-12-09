<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('client_id')->index();
            $table->string('order_status');
            $table->string('image_facture')->nullable();
            $table->string('numero')->unique();

            $table->string('anotherDay')->nullable();
            $table->string('hour')->nullable();
            $table->string('quatar_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('anothernumber')->default(007555520);
            $table->timestamps();
            $table->foreign("client_id")->references('id')->on('clients')
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
        Schema::dropIfExists('orders');
    }
}
