<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApl02sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apl02', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('category_models');
            $table->bigInteger('schema_id')->unsigned();
            $table->foreign('schema_id')->references('id')->on('schema_models');
            $table->bigInteger('assessor_id')->unsigned();
            $table->foreign('assessor_id')->references('id')->on('assessor');
            $table->bigInteger('assessi_id')->unsigned();
            $table->foreign('assessi_id')->references('id')->on('assessi');
            $table->bigInteger('apl01_id')->unsigned();
            $table->foreign('apl01_id')->references('id')->on('apl01s');
            $table->string('assessment');
            $table->string('note');
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
        Schema::dropIfExists('apl02');
    }
}
