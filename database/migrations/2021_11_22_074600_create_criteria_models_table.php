<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('element_id')->unsigned();
            $table->foreign('element_id')->references('id')->on('element_models');
            $table->string('criteria_code');
            $table->string('criteria_title');
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
        Schema::dropIfExists('criteria_models');
    }
}
