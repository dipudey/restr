<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    

    public function food() {
        return $this->belongsTo(Food::class,'food_id');
    }
}
