<?php

namespace Database\Seeders;

use App\Models\Dashboard\University;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class UniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('http://universities.hipolabs.com/search?country=United+States');
        $data = $response->collect();
    
        $counter = 1;
        foreach($data as $uni){
            if($counter > 100){
                break;
            }
            
            University::create([
                'alpha_two_code' => $uni['alpha_two_code'],
                'country' => $uni['country'],
                'domains' => $uni['domains'],
                'name' => $uni['name'],
                'web_pages' => $uni['web_pages'],
                'status_id' => 1
            ]);
            $counter++;
        }
    }
}
