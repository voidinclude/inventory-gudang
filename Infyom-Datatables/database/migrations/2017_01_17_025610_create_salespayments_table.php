<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesalespaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salespayments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paymentNo');
            $table->integer('invoiceID');
            $table->date('paymentDate');
            $table->string('payType');
            $table->string('bankNo');
            $table->string('bankName');
            $table->string('bankAC');
            $table->date('effectiveDate');
            $table->integer('total');
            $table->integer('customerID');
            $table->string('customerName');
            $table->text('customerAddress');
            $table->string('ref');
            $table->text('note');
            $table->integer('staffID');
            $table->string('staffName');
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
        Schema::drop('salespayments');
    }
}
