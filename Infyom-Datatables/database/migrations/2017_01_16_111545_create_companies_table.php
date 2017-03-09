<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecompaniesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('companyCode');
            $table->string('companyName');
            $table->string('contactPerson');
            $table->text('address');
            $table->string('village');
            $table->string('district');
            $table->string('city');
            $table->string('zipcode');
            $table->string('province');
            $table->string('phone');
            $table->string('fax');
            $table->string('phonecp');
            $table->string('email')->unique();
            $table->text('print_address');
            $table->text('faktur_address');
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
        Schema::drop('companies');
    }
}
