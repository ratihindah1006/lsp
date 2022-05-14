<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssessiAssessorAgreementToAK01Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ak01', function (Blueprint $table) {
            $table->boolean('assessor_agreement')->default(false)->after('status');
            $table->boolean('assessi_agreement')->default(false)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ak01', function (Blueprint $table) {
            //
        });
    }
}
