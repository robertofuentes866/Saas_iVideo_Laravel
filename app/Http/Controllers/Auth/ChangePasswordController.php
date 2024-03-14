<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function cambiaPassword(Request $request)
    {
       if (Hash::check($request->password,$request->user()->password ))
        {
            
            $user = User::find($request->user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response(null,200);
        }
        
        return response(["Errors"=>[
            "password"=>["El password proporcionado es incorrecto."]
        ]],422);
    }
}
