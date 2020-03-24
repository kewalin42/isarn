<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentenceWord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sentence_Word', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('sen_index');
            $table->string('status');
            //$table->timestamp('create_at');
            //$table->timestamp('update_at');
            

            $table->bigInteger('Sentence_id')->unsigned();
            $table->bigInteger('Word_id')->unsigned();
            $table->timestamps();
            $table->foreign('Sentence_id')->references('id')->on('Sentence');
            $table->foreign('Word_id')->references('id')->on('Word');

            

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sentence_Word');    
    }
}
