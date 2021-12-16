<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('schema_id')->unsigned();
            $table->foreign('schema_id')->references('id')->on('schema_models');
            $table->string('unit_code');
            $table->string('unit_title');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_models');
    }
}