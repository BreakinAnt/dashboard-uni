<?php

use App\Models\Dashboard\University;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('dev-uni-fill-table', function (){
    $response = Http::get('http://universities.hipolabs.com/search?country=United+States');
    $data = $response->collect();

    $counter = 1;
    foreach($data as $uni){
        if($counter > 100){
            break;
        }
        
        $uni['status_id'] = 1;
        University::create($uni);
        $counter++;
    }

    dd('done');
});