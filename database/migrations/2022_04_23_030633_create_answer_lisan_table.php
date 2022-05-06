<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerLisanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_lisan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessi_id')->unsigned();
            $table->foreign('assessi_id')->references('id')->on('assessi')->onDelete("cascade");
            $table->bigInteger('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('unit_schema')->onDelete("cascade");
            $table->bigInteger('code_lisan_id')->unsigned();
            $table->foreign('code_lisan_id')->references('id')->on('code_question_lisan')->onDelete("cascade");
            $table->longText('answer')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('rekomendasi')->nullable();
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
        Schema::dropIfExists('answer_lisan');
    }
}
