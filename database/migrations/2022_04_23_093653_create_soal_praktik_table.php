<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalPraktikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_praktik', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code_praktik_id')->unsigned();
            $table->foreign('code_praktik_id')->references('id')->on('code_praktik')->onDelete("cascade");
            $table->longText('instruksi');
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
        Schema::dropIfExists('soal_praktik');
    }
}
