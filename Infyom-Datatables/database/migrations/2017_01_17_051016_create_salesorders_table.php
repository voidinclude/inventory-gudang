<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesalesordersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soNo');
            $table->integer('customerID');
            $table->string('customerName');
            $table->text('customerAddress');
            $table->integer('staffID');
            $table->string('staffName');
            $table->date('orderDate');
            $table->date('needDate');
            $table->text('note');
            $table->integer('status');
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
        Schema::drop('salesorders');
    }
}
