<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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

        'id' => $this->id,
        'name' => (lang() == 'ar') ? $this->name_ar : $this->name_en,
        'details' => (lang() == 'ar') ? $this->details_ar : $this->details_en,
        'currency' => (lang() == 'ar') ? $this->currency->name_ar : $this->currency->name_en,
        'price' => $this->price,
        'status' => $this->status

        ];
    }
}
