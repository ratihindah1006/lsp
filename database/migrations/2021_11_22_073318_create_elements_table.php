<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('unit')->onDelete("cascade");
            $table->string('no_element');
            $table->string('element_title');
            $table->timestamps();
            
        });
            
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('element');
    }
}
