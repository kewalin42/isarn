<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sentence', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('sentence_text');
            $table->string('segmented_text');
            $table->string('is_approved');
            $table->string('approved_at');
            //$table->timestamp('create_at');
            //$table->timestamp('Update_at');
            
           

            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('Sentence_Types_id')->unsigned();
            $table->bigInteger('Document_id')->unsigned();
            $table->timestamps();
            // $table->foreign('users_id')->references('id')->on('users');
            // $table->foreign('Sentence_Types_id')->references('id')->on('Sentence_Types');
            // $table->foreign('Document_id')->references('id')->on('Document');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sentence');    
}
}