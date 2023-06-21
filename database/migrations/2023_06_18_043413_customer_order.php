<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomerOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->string('refno');
            $table->string('customer_name');
            $table->bigInteger('total_payment');
            $table->bigInteger('charge');
            $table->string('mode_of_payment');
            $table->string('payment_status');
            $table->longText('note');
            $table->rememberToken();
            $table->timestamps();
            //
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
}
