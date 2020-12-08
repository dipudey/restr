<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderFood;
use App\Models\Order;
use App\Models\Food;
use App\Models\Branch;
use App\Models\OrderPayment;
use App\User;
use Carbon\Carbon;
use Auth;

class OrderController extends Controller
{
    public function todayOrder() {
        return view('branch.order.todayOrder',[
            'sales' => Order::with('orderFoods','branch','table','waiter')->where('branch_id',Auth::id())->where('order_date',date('Y-m-d'))->where('status',3)->get(),
        ]);
    }
    
    public function takePayment($id) {
        $branch = Branch::find(Auth::id());
        return view('branch.order.takePayment',[
            'restarunt' => User::find($branch->user_id),
            'sale' => Order::findOrFail($id),
        ]);
    }

    public function takePaymentSubmit(Request $request) {
        $branch = Branch::find(Auth::id());
        OrderPayment::insert([
            'user_id' => $branch->user_id,
            'branch_id' => Auth::id(),
            'order_id' => $request->order_id,
            'payment_type' => $request->payment_type,
            'paying_amount' => $request->total_amount,
            'paying_date' => date('Y-m-d'),
            'created_at' => Carbon::now()
        ]);

        Order::find($request->order_id)->update(['status' => 4]);
        return redirect()->route('branch.today.order')->with('message',"Payment Taken Successfully");
    }

    public function sale() {
        return view('branch.order.sale',[
            'sales' => Order::with('orderFoods','branch','table','waiter')->where('branch_id',Auth::id())->where('status',4)->get(),
        ]);
    }

    public function invoice($order_id) {
        $branch = Branch::find(Auth::id());
        return view('branch.order.invoice',[
            'restarunt' => User::find($branch->user_id),
            'sale' => Order::findOrFail($order_id),
        ]);
    } 
}
