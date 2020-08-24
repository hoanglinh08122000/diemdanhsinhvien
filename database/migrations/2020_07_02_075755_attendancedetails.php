<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Attendancedetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendancedetails', function (Blueprint $table) {
            $table->integer('id_students')->unsigned();
            $table->integer('id_listpoints')->unsigned();
            $table->primary([ 'id_students', 'id_listpoints' ]);
            $table->foreign('id_students')->references('id')->on('students');
            $table->foreign('id_listpoints')->references('id')->on('listpoints');
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
