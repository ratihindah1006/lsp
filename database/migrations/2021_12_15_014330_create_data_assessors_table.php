<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAssessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_assessor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('no_met');
            $table->string('email')->unique();
            $table->string('assessor_signature');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(bcrypt('12345678'));
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
        Schema::dropIfExists('data_assessor');
    }
}
