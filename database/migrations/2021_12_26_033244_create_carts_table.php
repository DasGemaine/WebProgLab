<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //old
        // Schema::create('carts', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('userID')->references('id')->on('users');
        //     $table->foreignId('itemID')->references('id')->on('items');
        //     $table->integer('quantity');
        //     $table->timestamps();
        // });

        //new
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('itemID');
            $table->string('name');
            $table->integer('qty');
            $table->float('price');
            $table->string('image');
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
        Schema::dropIfExists('carts');
    }
}
