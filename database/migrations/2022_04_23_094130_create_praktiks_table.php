<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraktiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praktik', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessi_id')->unsigned();
            $table->foreign('assessi_id')->references('id')->on('assessi')->onDelete("cascade");
            $table->bigInteger('code_praktik_id')->unsigned();
            $table->foreign('code_praktik_id')->references('id')->on('code_praktik')->onDelete("cascade");
            $table->string('file_name');
            $table->string('file_path');
            $table->string('keterangan')->nullable();
            $table->string('catatan')->nullable();
            $table->boolean('rekomendasi')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('praktik');
    }
}
