<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_food', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id'); 
            $table->unsignedBigInteger('branch_id');
            $table->boolean('status')->default('0');
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
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
        Schema::dropIfExists('branch_food');
    }
}
