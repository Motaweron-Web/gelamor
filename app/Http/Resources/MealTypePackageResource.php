<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealTypePackageResource extends JsonResource
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

            'id' => $this->meal_type->id,
            'name_ar' => $this->meal_type->name_ar,
            'name_en' => $this->meal_type->name_en,
            'details_ar' => $this->meal_type->details_ar,
            'details_en' => $this->meal_type->details_en,
//            'package' => new PackageResource($this->package)

        ];
    }
}
