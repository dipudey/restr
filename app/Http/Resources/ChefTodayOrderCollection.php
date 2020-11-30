<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TableResource;
use App\Http\Resources\OrderFoodCollection;

class ChefTodayOrderCollection extends JsonResource
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
            'order_id' => $this->id,
            'order_time' => $this->created_at->diffForHumans(),
            'waiter_id' => $this->waiter_id,
            'waiter_name' => $this->waiter->name,
            'waiter_phone' => $this->waiter->phone,
            'table_id' => $this->table['id'],
            'table_name' => $this->table['table_name'],
            // 'table_name' => $this->table->table_name,
            'status' => $this->status,
            // 'order_foods' => $this->orderFoods,
            'order_foods' => OrderFoodCollection::collection($this->orderFoods)
        ];
    }
}
