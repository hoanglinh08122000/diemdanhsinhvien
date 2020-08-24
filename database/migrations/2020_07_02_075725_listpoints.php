<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Listpoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // điểm danh
         Schema::create('listpoints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_teacher')->unsigned();
            $table->integer('id_subject')->unsigned();
            $table->integer('id_class')->unsigned();
            $table->foreign('id_teacher')->references('id')->on('teacher');
            $table->foreign('id_subject')->references('id')->on('subject');
            $table->foreign('id_class')->references('id')->on('class');
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
