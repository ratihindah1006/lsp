<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAK01STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ak01', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessi_id')->unsigned();
            $table->foreign('assessi_id')->references('id')->on('assessi');
            $table->boolean('tl_verif_porto')->default(false);
            $table->boolean('t_p_tulis')->default(false);
            $table->boolean('t_p_lisan')->default(false);
            $table->boolean('t_p_wawancara')->default(false);
            $table->boolean('l_obs_langsung')->default(false);
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
        Schema::dropIfExists('ak01');
    }
}
