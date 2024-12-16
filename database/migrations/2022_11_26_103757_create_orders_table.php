<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('first_name', '191');
            $table->string('last_name', '191');
            $table->string('email', '55');
            $table->string('phone', '20');
            $table->string('dci_no', '55');
            $table->string('city', '191');
            $table->string('state', '191');
            $table->float('grand_total');
            $table->string('payment_method', '55');
            $table->string('payment_status', '55');
            $table->string('payment_id', '55');
            $table->longText('payment_response');
            $table->longText('d1')->nullable();
            $table->longText('d2')->nullable();
            $table->longText('d3')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
