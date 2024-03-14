<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\SubscriptionSwapRequest;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('subscribed')->only('swapSubscription');
    }

    public function createSubscription(SubscriptionRequest $request)
    {
        $plan = Plan::where('slug',$request->plan)->first();

        $request->user()->newSubscription('default',$plan->stripe_id)
                 ->create($request->token);
    }

    public function swapSubscription(SubscriptionSwapRequest $request)
    {
        $plan = Plan::where('slug',$request->plan)->first();

        if ( $request->user()->usage() > $plan->storage)
        {
            return response()->json('Error',400);
        }
         
        if (!$plan->is_free)
        {
            $request->user()->subscription('default')->swap($plan->stripe_id);
           
        } else
        {
            $request->user()->subscription('default')->cancel();
        }
         return response()->json($plan->storage);
        
    }

}
