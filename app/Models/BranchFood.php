<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchFood extends Model
{
    protected $guarded = []; 

    public function foodDetails() {
        return $this->belongsTo(Food::class,'food_id');
    }
}
