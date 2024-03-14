<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Auth\RegisterRequest;
use App\Transformers\UserTransformer;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        //$this->middleware('transformarCampos:'. UserTransformer::class)->only(['register']);
    }
    
    public function register(RegisterRequest $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);
        
    }
}
