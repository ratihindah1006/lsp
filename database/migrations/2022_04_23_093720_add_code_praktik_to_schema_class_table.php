<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodePraktikToSchemaClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schema_class', function (Blueprint $table) {
            $table->bigInteger('code_praktik_id')->unsigned()->after('code_id');
            $table->foreign('code_praktik_id')->references('id')->on('code_praktik')->onDelete("cascade");
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
