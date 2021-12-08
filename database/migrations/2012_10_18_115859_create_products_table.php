<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table){

            $table->id();
            $table->string('product_image')->nullable();
            $table->string('product_name')->nullable();
            $table->text('product_description')->nullable();
            $table->text('product_category')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_status')->nullable();

            $table->integer('stock')->nullable();
            $table->integer('stock_min')->nullable();
            $table->integer('encombrement')->nullable();
            $table->text('reference')->nullable();
            $table->double('poids')->nullable();
        
            $table->string('admin_shop_id')->default('0');
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
        Schema::dropIfExists('products');
    }
}
