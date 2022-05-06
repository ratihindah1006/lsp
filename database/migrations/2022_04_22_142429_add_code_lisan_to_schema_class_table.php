<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodeLisanToSchemaClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schema_class', function (Blueprint $table) {
            $table->bigInteger('code_lisan_id')->unsigned()->after('code_id');
            $table->foreign('code_lisan_id')->references('id')->on('code_question_lisan')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schema_class', function (Blueprint $table) {
            //
        });
    }
}
