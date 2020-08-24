<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubjectTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('subject_teacher', function (Blueprint $table) {
            
            $table->integer('id_teacher')->unsigned();
            $table->integer('id_subject')->nullable()->unsigned();
            $table->primary([ 'id_teacher', 'id_subject' ]);
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
