<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaddysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caddies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->integer('quantite');
            $table->double('total_price');
            $table->timestamps();

            $table->foreign("order_id")->references('id')->on('orders')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->foreign("product_id")->references('id')->on('products')
            ->onDelete('restrict')->onUpdate('restrict');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caddies');
    }
}
