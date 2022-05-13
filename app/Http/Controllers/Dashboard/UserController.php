<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserLoginRequest;
use App\Http\Requests\Dashboard\UserSignupRequest;
use App\Models\Dashboard\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.login');
    }

    public function signup(UserSignupRequest $req)
    {
        try {
            User::create($req->all());

            return redirect()->route('dashboard.user.login.get')->with(['message' => 'Usuário cadastrado com sucesso']);
        } catch (Throwable $e) {
            Log::channel('user-signup')->error($e);
            
            return redirect()->route('dashboard.user.login.get')->withErrors(['Ocorreu um erro!']);
        }
    }

    public function login(UserLoginRequest $req)
    {
        $user = User::where('email', $req->email)->first();
        
        if(Hash::check($req->password, $user->password)){
            Auth::guard('web')->login($user);

            return redirect()->route('dashboard.user.login.get')->with(['message' => 'Usuário logado']);
        }

        return redirect()->route('dashboard.user.login.get')->withErrors(['Email/senha errada!']);
    }
}
