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
            $table->datetime('transaction_date');
            $table->string('status_code');
            $table->string('message');
            $table->string('signature_key');
            $table->string('payment_type');
            $table->string('masked_card');
            $table->decimal('gross_amount', 20, 2);
            $table->string('channel_response_message');
            $table->string('bank');
            $table->string('approval_code');
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
