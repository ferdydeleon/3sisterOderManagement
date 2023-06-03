<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
           // $table->string('phone_number');
            $table->string('order');
            $table->string('amount');
            $table->string('payment');
            $table->string('deliver_charge');
           // $table->longText('town');
           // $table->longText('barangay');
           // $table->longText('street_number');
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
        Schema::dropIfExists('orders');
    }
}
