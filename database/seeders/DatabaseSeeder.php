<?php

namespace Database\Seeders;

use App\Models\Dashboard\UniversityStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UniversityStatusTableSeeder::class,
            UniversitiesTableSeeder::class
        ]);
    }
}
