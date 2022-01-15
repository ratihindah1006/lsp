<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('schema_class');
            $table->bigInteger('assessor_id')->unsigned();
            $table->foreign('assessor_id')->references('id')->on('assessor');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('assessi');
    }
}
