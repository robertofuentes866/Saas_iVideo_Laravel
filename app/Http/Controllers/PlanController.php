<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:sanctum');
    }
    
    public function getPlans()
    {
        return PlanResource::collection(Plan::orderBy('storage','asc')->get());
    }
}
