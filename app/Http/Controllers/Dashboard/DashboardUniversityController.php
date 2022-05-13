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
        
        UserUniversity::create([
            'user_id' => $user->id,
            'university_id' => $university->id
        ]);

        return redirect()->route('dashboard.index.get')->withMessage("Inscrição na $university->name realizado com sucesso!");
    }
}
