<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMUK06STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muk06', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessi_id')->unsigned();
            $table->foreign('assessi_id')->references('id')->on('assessi')->onDelete("cascade");
            $table->boolean('assessor_agreement')->default(false);
            $table->boolean('assessi_agreement')->default(false);
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
        Schema::dropIfExists('muk06');
    }
}
