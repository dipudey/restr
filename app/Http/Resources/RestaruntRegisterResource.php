<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaruntRegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'restaurant_name' => $this->restaurant_name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'owner_name' => $this->owner_name,
            'website_link' => $this->website_link,
            'facebook_page' => $this->facebook_page,
            'city' => $this->city,
            'zip' => $this->zip,
            'country' => $this->country,
            'user_name' => $this->user_name,
            'user_category' => $this->user_category,
            'package_id' => $this->package_id, 
            'expaier_date' => $this->expaier_date, 
        ];
    }
}
