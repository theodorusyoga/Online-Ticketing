<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_data', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('user_id')->on('order_details');
            $table->string('identity_card');
            $table->string('identity_card_photo');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone_number');
            $table->string('domicile');
            $table->string('domicile_city');
            $table->integer('age');
            $table->string('booking_code');
            $table->decimal('total_price', 20, 2);
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
        Schema::dropIfExists('personal_data');
    }
}
