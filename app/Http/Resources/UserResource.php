<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request){

        return [

            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'country_id' => (int)$this->country_id,
            'img' => $this->img != 'default.png' ? asset('img_user/' . $this->img) : asset('img_default/default.png'),
            'is_active' => $this->is_active,
            'token'=>'Bearer '.$this->token ??'',
            'created_at' => $this->created_at->format('Y-m-d')

        ];
    }

}
