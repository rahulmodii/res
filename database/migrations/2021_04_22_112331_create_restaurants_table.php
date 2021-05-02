<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->char('restaurant_name', 250);
            $table->char('phone', 15);
            $table->char('manager_name', 120);
            $table->char('manager_contact',15);
            $table->char('contact_email',120);
            $table->bigInteger('country');
            $table->bigInteger('state');
            $table->bigInteger('city');
            $table->double('latitude', 8,7);
            $table->double('longitude', 8,7);
            $table->char('slug', 250);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
