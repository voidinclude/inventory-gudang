<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesalesorderitemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesorderitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soID');
            $table->integer('productID');
            $table->string('productName');
            $table->string('sku');
            $table->integer('price');
            $table->integer('qty');
            $table->text('note');
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
        Schema::drop('salesorderitems');
    }
}
