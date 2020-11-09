<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $fillable = [
        'category_name',"user_id"
    ];

    public function food() {
        return $this->hasMany(Food::class,'food_category_id');
    }
}
