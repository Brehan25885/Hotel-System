<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToClientsTableCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('clients', function (Blueprint $table) {
           
            $table->integer('client_accompany_no');
            $table->string('room_number');
            $table->string('paid_price');


        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('client_accompany_no');
            $table->dropColumn('room_number');
            $table->dropColumn('paid_price');
        });
    }
}
