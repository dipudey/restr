<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waiter extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

    public function branch() {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function order() {
        return $this->hasMany(Order::class,'waiter_id')->where('order_date',date('Y-m-d'));
    }
}
