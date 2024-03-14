<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        //$this->middleware('Auth:sactum')->only('genToken');
    }

    public function login(LoginRequest $request)
    {
        if (!auth()->guard()->attempt($request->only('email','password')))
        {
            throw new AuthenticationException();
        }
    }

    public function genToken(Request $request)
    {
        $usuario = User::find($request->id);
        return $usuario->createToken('laravel');
    }
}
