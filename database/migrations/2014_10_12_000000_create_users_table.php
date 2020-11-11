<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phone');
            $table->string('owner_name');
            $table->string('website_link')->nullable();
            $table->string('facebook_page')->nullable();
            $table->string('city');
            $table->string('zip');
            $table->string('country');
            $table->string('user_name')->nullable();
            $table->string('user_category')->default('restarunt');
            $table->boolean('status')->default(1);
            $table->date('expaier_date')->nullable();
            $table->unsignedBigInteger('package_id'); 
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
