<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodeIdToSchemaClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schema_class', function (Blueprint $table) {
            $table->bigInteger('code_id')->unsigned()->after('schema_id');
            $table->foreign('code_id')->references('id')->on('code_question')->onDelete("cascade");
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
