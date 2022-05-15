<?php

namespace App\Http\Controllers\API;

use App\Helpers\JsonMsg;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserLoginAPIRequest;
use App\Models\Dashboard\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserAPIController extends Controller
{
    public function login(UserLoginAPIRequest $req)
    {
        $data = ['user', 'token'];

        $user = User::with([
                'universities' => function($cb){ return $cb->with('status');}
            ])
            ->where(['email' => $req->email])
            ->first();

        $errors = [];
        if(!$user){
            array_push($errors, 'E-mail não está cadastrado no sistema.');
            return JsonMsg::create($errors, true, 404);
        }      
        if(!Hash::check($req->password, $user->password)){
            array_push($errors, 'Dados incorretos.');
        }
        if(count($errors)){
            return JsonMsg::create($errors, true, 404);
        }

        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;

        return JsonMsg::create(compact($data));
    }

    public function user()
    {
        $data = ['user'];

        $user = User::with([
            'universities' => function($cb){ return $cb->with('status');}
        ])
        ->find(Auth('sanctum')->user()->id); 
            dd($user->tokens);
        return JsonMsg::create(compact($data));
    }
}
