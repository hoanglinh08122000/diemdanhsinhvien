<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
         Schema::create('subject', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->unique();
            $table->string('time',50);
            $table->integer('id_discipline')->unsigned();
            
            $table->foreign('id_discipline')->references('id')->on('discipline');
            
            $table->integer('status');
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
    }
}
