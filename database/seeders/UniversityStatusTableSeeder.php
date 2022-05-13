<?php

namespace Database\Seeders;

use App\Models\Dashboard\UniversityStatus;
use Illuminate\Database\Seeder;

class UniversityStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UniversityStatus::updateOrCreate(['id' => 1], [
            'name' => 'Aprovado'
        ]);
        UniversityStatus::updateOrCreate(['id' => 2], [
            'name' => 'Aguardando Aprovação'
        ]);
        UniversityStatus::updateOrCreate(['id' => 3], [
            'name' => 'Recusado'
        ]);
    }
}
