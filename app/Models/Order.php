<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function waiter() {
        return $this->belongsTo(Waiter::class,'waiter_id');
    }

    public function table() {
        return $this->belongsTo(Table::class,'table_id');
    }

    public function branch() {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function orderFoods() {
        return $this->hasMany(OrderFood::class,'order_id');
    }

    


}
