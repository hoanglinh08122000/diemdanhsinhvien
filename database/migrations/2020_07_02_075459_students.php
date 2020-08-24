<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->date('date');
            $table->integer('level');
            $table->text('address');
            $table->string('phone',15);
            $table->string('email',50);
            $table->boolean('gender');
            // $table->string('user',50);
            $table->string('password',250);
            $table->integer('id_class')->unsigned();;
     
            
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
