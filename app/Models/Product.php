<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function purchaseProduct() {
        return $this->hasMany(Purchase::class,'product_id');
    }
}
