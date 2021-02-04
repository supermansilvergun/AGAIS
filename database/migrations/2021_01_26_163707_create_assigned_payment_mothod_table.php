<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedPaymentMothodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_payment_mothod', function (Blueprint $table) {
            $table->integer('employee_id')->unsigned();
            $table->integer('bank_id')->nullable()->unsigned();
            $table->integer('payment_gateway_id')->nullable()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_payment_mothod');
    }
}
