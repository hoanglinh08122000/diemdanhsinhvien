<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Assignmen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignmen', function (Blueprint $table) {
            $table->integer('id_teacher')->unsigned();
            $table->integer('id_subject')->unsigned();
            $table->primary([ 'id_teacher', 'id_subject' ]);
            $table->integer('id_class')->unsigned();
            $table->foreign('id_class')->references('id')->on('class');
            $table->foreign('id_teacher')->references('id')->on('teacher');
            $table->foreign('id_subject')->references('id')->on('subject');
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
