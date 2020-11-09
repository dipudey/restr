<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodCollection extends JsonResource
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
            'id' => $this->id,
            'food_category' => $this->category->category_name,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_price' => $this->discount_price,
            'picture' => "/uploads/".$this->picture,
            'status' => $this->status == 1 ? "Available" : "Unavailable"
        ];
    }
}
