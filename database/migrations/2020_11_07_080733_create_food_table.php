<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('food_name');
            $table->string('price');
            $table->string('discount_percentage')->nullable();
            $table->string('discount_amount')->nullable();
            $table->float('discount_price')->nullable();
            $table->string('picture')->nullable();
            $table->foreign('food_category_id')->references('id')->on('food_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            
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
        Schema::dropIfExists('food');
    }
}
