<?php

namespace Database\Seeders;

use App\Models\Dashboard\University;
use App\Models\Dashboard\UniversitySuggestion;
use App\Models\Dashboard\User;
use App\Models\Dashboard\UserUniversity;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        University::factory()->count(5)->create();
        User::factory()->count(5)->create();
        UserUniversity::factory()->count(5)->create();
    }
}
