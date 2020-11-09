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
            'restaurant_name' => $this->restaurant_name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'branch_number' => $this->branch_number,
            'owner_name' => $this->owner_name,
            'website_link' => $this->website_link,
            'facebook_page' => $this->facebook_page,
            'city' => $this->city,
            'zip' => $this->zip,
            'country' => $this->country,
            'employee_number' => $this->employee_number,
            'waiter_number' => $this->waiter_number,
            'user_name' => $this->user_name,
            'user_category' => $this->user_category,
        ];
    }
}
