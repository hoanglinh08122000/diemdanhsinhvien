<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Classs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('id_discipline')->unsigned();
            $table->integer('id_course')->unsigned();
            $table->foreign('id_discipline')->references('id')->on('discipline');
            $table->foreign('id_course')->references('id')->on('course');
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
