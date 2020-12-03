<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = [];

    public function expenseType() {
        return $this->belongsTo(ExpenseType::class,'expense_type_id');
    }

    public function branch() {
        return $this->belongsTo(Branch::class,'branch_id');
    }
}
