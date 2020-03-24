<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Document', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('title');
            //$table->timestamp('create_at');
            //$table->timestamp('update_at');
            

        $table->bigInteger('Users_id');
        $table->bigInteger('Document_Type_id');
        $table->timestamps();
        // $table->foreign('Users_id')->references('id')->on('Users');
        // $table->foreign('Document_Type_id')->references('id')->on('Document_Type');
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
        Schema::dropIfExists('Document');      
    }
}
