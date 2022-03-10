<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemaClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schema_class', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('event');
            $table->bigInteger('schema_id')->unsigned();
            $table->foreign('schema_id')->references('id')->on('schema');
            $table->string('name');
            $table->string('description');
            $table->string('tuk');
<<<<<<< HEAD
=======
            $table->softDeletes();
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
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
        Schema::dropIfExists('schema_class');
    }
}
