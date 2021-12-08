<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsLetterDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_letter_data', function (Blueprint $table){
            $table->id();
            $table->string('title');
            $table->text('image');
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('subdescription')->nullable();
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
        Schema::dropIfExists('news_letter_data');
    }
}
