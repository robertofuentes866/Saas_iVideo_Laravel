<?php

namespace App\Http\Resources;

use App\Http\Resources\PlanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "subscribed" => $this->subscribed("default"),
            "ends_at" => optional(optional($this->subscription())->ends_at)->toDateTimeString(),
            "plan" => new PlanResource($this->plan),

        ];
    }
}
