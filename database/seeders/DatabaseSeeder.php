<?php

namespace Database\Seeders;

use App\Models\AdminModel;
use Illuminate\Database\Seeder;
use App\Models\DataAssessiModel;
use App\Models\DataAssessorModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        AdminModel::factory(10)->create();
        DataAssessiModel::factory(10)->create();
        DataAssessorModel::factory(10)->create();
    }
}
