<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Expense;
use App\Models\Branch;
use App\Models\Reservation;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today_income = \DB::table('orders')
                            ->join('order_food','order_food.order_id','=','orders.id')
                            ->where(['order_date' => date('Y-m-d'),'user_id' => Auth::id()])
                            ->get();
        $monthly_income = \DB::table('orders')
                            ->join('order_food','order_food.order_id','=','orders.id')
                            ->whereMonth('order_date',date('m'))
                            ->where('user_id',Auth::id())
                            ->get();


        return view('home',[
            'today_order' => Order::where('user_id',Auth::id())->where('order_date',date('Y-m-d'))->count(),
            'today_expense' => Expense::where('user_id',Auth::id())->where('expense_date',date('Y-m-d'))->sum('amount'),
            'today_income' => $today_income->sum('total_price'),
            'monthly_expense' => Expense::where('user_id',Auth::id())->whereMonth('expense_date',date('m'))->sum('amount'),
            'monthly_income' => $monthly_income->sum('total_price'), 
            'branches' => Branch::where('user_id',Auth::id())->get(),
            'today_reservation' => Reservation::where('reservation_date',date('Y-m-d'))->where('user_id',Auth::id())->get(),
        ]);
    }



    public function profile() {
        return view('restarunt.profile.profile');
    }
}
