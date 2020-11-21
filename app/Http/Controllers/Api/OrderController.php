<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\Food;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function order(Request $request) {

        $order_id = Order::insertGetId([
            'user_id' => $request->user_id,
            'branch_id' => $request->branch_id,
            'waiter_id' => $request->waiter_id,
            'table_id' => $request->table_id,
            'order_date' => date('Y-m-d'),
            'order_time' => Carbon::now()->format('h:i:s'),
            'total_price' => $request->total_price,
            'created_at' => Carbon::now()
        ]);

        $food_list = [];
        for($i = 0;$i < count($request->foods);$i++) {
            $food_list[] = [
                'order_id' => $order_id,
                'food_id' => $request->foods[$i]['food_id'],
                'price' => $request->foods[$i]['price'],
                'qty' => $request->foods[$i]['qty'],
                'total_price' => ($request->foods[$i]['qty']*$request->foods[$i]['price']),
                'created_at' => Carbon::now()
            ];
        }

        OrderFood::insert($food_list);

        return response()->json([
            'data' => "Order Send Successfully"
        ]);

    }
}