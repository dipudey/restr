<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderFood;
use App\Models\Order;
use App\Models\Food;
use Auth;

class SaleController extends Controller
{
    public function todaySaleFoodList() {
        return view('restarunt.sale.saleFood',[
            'foods' => Food::where('user_id',Auth::id())->get()
        ]);
    }
}
