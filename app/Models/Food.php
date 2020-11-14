<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Food extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(FoodCategory::class,'food_category_id');
    }

    public function branchFood() {
        return $this->hasOne(BranchFood::class,'food_id')->where('branch_id',Auth::id());
    }
}
