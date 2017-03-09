<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecustomersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customerCode');
            $table->string('customerName');
            $table->string('contactPerson');
            $table->string('address');
            $table->text('address2');
            $table->string('village');
            $table->string('district');
            $table->string('city');
            $table->integer('zipCode');
            $table->string('province');
            $table->string('phone');
            $table->string('fax');
            $table->string('phonecp1');
            $table->string('phonecp2');
            $table->string('email');
            $table->text('note');
            $table->string('npwp');
            $table->string('pkpName');
            $table->string('category');
            $table->string('status');
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
        Schema::drop('customers');
    }
}
