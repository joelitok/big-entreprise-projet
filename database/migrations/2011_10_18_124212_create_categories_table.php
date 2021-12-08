<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidcomposer install --ignore-platform-reqs
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('category_name');
                $table->string('category_status');
                $table->integer('idParent')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
