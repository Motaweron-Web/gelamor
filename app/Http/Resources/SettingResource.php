<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{

    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'location_ar' => $this->location_ar,
            'location_en' => $this->location_en,
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'about_ar' => $this->about_ar,
            'about_en' => $this->about_en,
            'privacy_ar' => $this->privacy_ar,
            'privacy_en' => $this->privacy_en,
            'terms_ar' => $this->terms_ar,
            'terms_en' => $this->terms_en,
            'facebook' => $this->facebook,
            'whatsapp' => $this->whatsapp,
            'snapchat' => $this->snapchat,
            'created_at' => $this->created_at->format('Y-m-d')


        ];
    }
}
