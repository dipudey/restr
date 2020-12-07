<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    protected $guarded = [];

    public function purchaseProduct() {
        return $this->hasMany(Purchase::class,'product_id');
    }

    public function branchPurchaseProduct() {
        return $this->hasMany(Purchase::class,'product_id')->where('branch_id',Auth::id());
    }
}
