<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('clients',function($table){
            $table->string('email');
            $table->string('name');
            $table->string('avatar_image');
            $table->integer('country_code');
            $table->boolean('gender');
            $table->boolean('approved');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('clients',function($table){
            $table->dropColumn('email');
            $table->dropColumn('name');
            $table->dropColumn('avatar_image');
            $table->number('country_code');
            $table->dropColumn('gender');
            $table->dropColumn('approved'); 

        });
        
    }
    
}
