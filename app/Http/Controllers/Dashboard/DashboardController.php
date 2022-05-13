<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $req)
    {
        $data = ['user', 'universities'];

        $user = Auth::guard('web')->user();
        $universities = (isset($req->name) ? University::where('name', 'like', "%$req->name%") : University::query())->get(['id', 'alpha_two_code', 'name', 'status_id']);
        
        return view('dashboard.home.index', compact($data));
    }
}
