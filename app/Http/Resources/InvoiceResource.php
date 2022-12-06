<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
             'invoice_date' => $this->invoice_date,
             'user' => new UserResource($this->user),
             'meals' => MealResource::collection($this->meals),
            'created_at' => $this->created_at->format('Y-m-d')

        ];
    }
}
