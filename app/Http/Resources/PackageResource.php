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
        'name_ar' => $this->name_ar,
        'name_en' => $this->name_en,
        'details_ar' => $this->details_ar,
        'details_en' => $this->details_en,
        'start' => $this->start,
        'end' => $this->end,
        'price' => $this->price,
        'currency_ar' => $this->currency->name_ar,
        'currency_en' => $this->currency->name_en,
        'status' => $this->status

        ];
    }
}
