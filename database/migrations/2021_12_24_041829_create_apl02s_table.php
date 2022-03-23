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
            $table->foreign('assessi_id')->references('id')->on('assessi')->onDelete("cascade");
            $table->bigInteger('assessi_id')->unsigned();
            $table->string('assessment');
            $table->string('status')->nullable();
            $table->string('lane')->nullable();
            $table->string('note')->nullable();
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
