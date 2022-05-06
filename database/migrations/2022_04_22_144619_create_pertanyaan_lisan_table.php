<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanLisanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_lisan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('unit_schema')->onDelete("cascade");
            $table->bigInteger('code_lisan_id')->unsigned();
            $table->foreign('code_lisan_id')->references('id')->on('code_question_lisan')->onDelete("cascade");
            $table->string('no_soal');
            $table->longText('question');
            $table->longText('key_answer');
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
        Schema::dropIfExists('pertanyaan_lisan');
    }
}
