<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [];

    public function branch() {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function table() {
        return $this->belongsTo(Table::class,'table_id');
    }
}
