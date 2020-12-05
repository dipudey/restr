<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderFood;
use App\Models\Order;
use App\Models\Food;
use App\User;
use Auth;

class SaleController extends Controller
{
    public function todaySaleFoodList() {
        return view('restarunt.sale.saleFood',[
            'foods' => Food::where('user_id',Auth::id())->get()
        ]);
    }

    public function todaySale() {
        return view('restarunt.sale.todaySale',[
            'sales' => Order::with('orderFoods','branch','table','waiter')->where('user_id',Auth::id())->where('order_date',date('Y-m-d'))->where('status',4)->get(),
        ]);
    }

    public function invoice($id) {
        return view('restarunt.sale.invoice',[
            'restarunt' => User::find(Auth::id()),
            'sale' => Order::findOrFail($id),
        ]); 
    }

    public function sale(){
        return view('restarunt.sale.sale',[
            'sales' => Order::with('orderFoods','branch','table','waiter')->where('user_id',Auth::id())->where('status',4)->orderBy('id','desc')->get(),
        ]);
    }
}
