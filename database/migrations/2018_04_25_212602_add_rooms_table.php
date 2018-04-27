<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->integer('capacity');
            $table->integer('price');
            $table->integer('is_reserved');


                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
        //
    }

}
