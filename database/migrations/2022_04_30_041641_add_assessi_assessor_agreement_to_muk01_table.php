<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssessiAssessorAgreementToMuk01Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('muk01', function (Blueprint $table) {
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
        Schema::table('muk01', function (Blueprint $table) {
            //
        });
    }
}
