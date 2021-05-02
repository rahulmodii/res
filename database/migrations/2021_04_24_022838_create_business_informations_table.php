<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_informations', function (Blueprint $table) {
            $table->id();
            $table->char('business_name', 250);
            $table->char('help_line_number', 15);
            $table->char('email', 120);
            $table->mediumText('address');
            $table->mediumText('meta_description');
            $table->char('header_logo', 120);
            $table->char('footer_logo', 120);
            $table->char('facebook', 120);
            $table->char('instagram', 120);
            $table->char('twitter', 120);
            $table->char('youtube', 120);
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
        Schema::dropIfExists('business_informations');
    }
}
