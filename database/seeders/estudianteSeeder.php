<?php

namespace Database\Seeders;

use App\Models\estudiante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class estudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        estudiante::factory(1000)->create();
    }
}
