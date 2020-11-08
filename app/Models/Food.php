<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(FoodCategory::class,'food_category_id');
    }
}
