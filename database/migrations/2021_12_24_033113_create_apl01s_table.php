<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApl01sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apl01s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessi_id')->unsigned();
            $table->foreign('assessi_id')->references('id')->on('assessi');
            $table->string('nik');
            $table->string('name');
            $table->string('domicile');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('address');
            $table->string('no_hp');
            $table->string('email');
            $table->string('last_education');
            $table->string('comp_name');
            $table->string('job_title');
            $table->string('position');
            $table->string('comp_address');
            $table->string('comp_telp');
            $table->string('comp_fax');
            $table->string('comp_email');
            $table->string('postal_code');
            $table->string('sert_schema');
            $table->string('assessment_purpose');
            $table->string('ijazah')->nullable();
            $table->string('photo')->nullable();
            $table->string('ktp')->nullable();
            $table->string('transcript')->nullable();
            $table->string('work_exper_certif')->nullable();
            $table->string('assessi_signature')->nullable();
            $table->string('assessor_signature')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('apl01s');
    }
}
