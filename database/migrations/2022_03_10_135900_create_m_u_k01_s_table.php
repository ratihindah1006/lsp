<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMUK01STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muk01', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessi_id')->unsigned();
            $table->foreign('assessi_id')->references('id')->on('assessi');
            $table->json('rekomendasi');
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
        Schema::dropIfExists('muk01');
    }
}
