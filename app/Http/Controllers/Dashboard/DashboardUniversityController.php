<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\University;
use App\Models\Dashboard\UserUniversity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardUniversityController extends Controller
{
    public function subscribe(University $university)
    {
        $user = Auth::guard('web')->user();
        
        $alreadySubscribed = UserUniversity::where([
            'user_id' => $user->id,
            'university_id' => $university->id
        ])->first();

        $errors = [];
        if($alreadySubscribed){
            array_push($errors, "Você já está inscrito na universidade $university->name.");
        }
        if($university->status->name !== 'Aprovado'){
            array_push($errors, "Só é possivel se inscrever em universidades aprovadas.");
        }
        if(count($errors)){
            return redirect()->route('dashboard.index.get')->withErrors($errors);
        }
        
        UserUniversity::create([
            'user_id' => $user->id,
            'university_id' => $university->id
        ]);
        return redirect()->route('dashboard.index.get')->withMessage("Inscrição na $university->name realizado com sucesso!");
    }
}
