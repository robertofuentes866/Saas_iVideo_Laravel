<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:sanctum');
    }
    
    public function getUser(Request $request)
    {
        UserResource::withoutWrapping();
        return new UserResource($request->user());
    }

    
}
