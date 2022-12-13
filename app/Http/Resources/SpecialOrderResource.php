<?php

namespace App\Http\Resources;

use App\Models\Component;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecialOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'user' => new UserResource($this->user),
            'date_of_order' => $this->date_of_order,
            'meal_type' => new MealTypeResource($this->meal_type),
            'components' => ComponentResource::collection(Component::whereIn('id',$this->component_ids)->get()),
            'protein' => $this->protein,
            'type' => $this->type,
            'created_at' => $this->created_at->format('Y-m-d'),

        ];
    }
}
