<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class UserPlanAvailableController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:sanctum');
    }

    public function getAvailablePlans(Request $request)
    {
        return [
            'data' => Plan::orderBy('storage','asc')->get()->flatmap(function($plan) use ($request){
                    return [
                        array_merge(
                            (new PlanResource($plan))->toArray($request),
                            ['can_downgrade' => $request->user()->usage() <= $plan->storage]
                        ) 
                    ];
            })
        ];
    }
}
