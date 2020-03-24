<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Word', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('word');
            //$table->timestamp('create_at');
            //$table->timestamp('update_at');
            $table->string('order');
            $table->string('type');

            $table->bigInteger('users_id')->unsigned();
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users');

       

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
        Schema::dropIfExists('Word');    
    }
}
