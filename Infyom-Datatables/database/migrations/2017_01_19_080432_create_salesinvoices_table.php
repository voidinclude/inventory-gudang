<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesalesinvoicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesinvoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoiceNo', 20);
            $table->string('invoiceDate', 10);
            $table->string('soID', 11);
            $table->string('status', 2);
            $table->string('paymentType', 20);
            $table->string('expiredDate', 10);
            $table->string('ppn', 20);
            $table->string('total', 20);
            $table->string('discount', 20);
            $table->string('grandtotal', 20);
            $table->string('customerID', 11);
            $table->string('customerName', 50);
            $table->string('customerAddress', 255);
            $table->string('staffID', 11);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('salesinvoices');
    }
}
