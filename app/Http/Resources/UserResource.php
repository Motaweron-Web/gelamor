<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request){

        return [

            'id' => $this->id,
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'email' => $this->email,
            'phone' => $this->phone,
            'location_ar' => $this->location_ar,
            'location_en' => $this->location_en,
            'country_id' => $this->country_id,
            'img' => $this->img != 'default.png' ? asset('img_user/' . $this->img) : asset('img_default/default.png'),
            'is_active' => $this->is_active,
            'token' => $this->token,
            'created_at' => $this->created_at->format('Y-m-d')

        ];
    }

}
