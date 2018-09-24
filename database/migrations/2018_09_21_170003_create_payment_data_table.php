<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->datetimetz('request_date');
            $table->datetimetz('expired_date');
            $table->decimal('ticket_price', 20, 2);
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
        Schema::dropIfExists('payment_data');
    }
}
