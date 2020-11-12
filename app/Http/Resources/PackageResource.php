<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'branch' => $this->branch,
            'chef' => $this->chef,
            'waiter' => $this->waiter,
            'order' => $this->order,
            'amount' => $this->amount,
        ];
    }
}
