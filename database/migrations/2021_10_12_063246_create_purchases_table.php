<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
          $table->id();
          $table->integer('code');
          $table->string('name');
          $table->string('size');
          $table->string('color');
          $table->string('image');
          $table->integer('quanlity');
          $table->integer('total_price');
          $table->integer('customers_id')->unsigned();
          $table->foreign('customers_id')->references('id')->on('customers');
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
        Schema::dropIfExists('purchases');
    }
}
