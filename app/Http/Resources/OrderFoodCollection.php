<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderFoodCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'food' => $this->food->food_name,
            'picture' => "/uploads/".$this->food->picture,
            'qty' => $this->qty, 
        ];
    }
}
