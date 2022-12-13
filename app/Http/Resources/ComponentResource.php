<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComponentResource extends JsonResource
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
            'image' => asset('assets/uploads/components/' . $this->img),
            'name' => lang() == 'ar' ? $this->name_ar : $this->name_en,
            'protein' => $this->protein,
            'calories' => $this->calories,
            'fats' => $this->fats,
            'carbohydrates' => $this->carbohydrates,
            'category' => new ComponentCategoryResource($this->type),
        ];
    }
}
