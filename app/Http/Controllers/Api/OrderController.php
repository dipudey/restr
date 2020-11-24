<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\Food;
use App\Http\Resources\ChefTodayOrderCollection;
use App\Http\Resources\PendingOrderResource;
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

    public function chefTodayOrder($user_id,$branch_id){
        return ChefTodayOrderCollection::collection(Order::where('order_date',date('Y-m-d'))->where('user_id',$user_id)->where('branch_id',$branch_id)->get());
    }

    public function statusUpdate(Request $request) {
        Order::findOrFail($request->order_id)->update([
            'status' => $request->status
        ]);

        return response()->json([
            'data' => "Coocking"
        ]);
    }

    public function waitePendingOrder($user_id,$waiter_id) {

        $data = Order::where('order_date',date('Y-m-d'))->where('status',0)->where('user_id',$user_id)->where('waiter_id',$waiter_id)->get();
        $pending_table = [];

        foreach($data as $item) {
            $pending_table[] = [
                'order_id' => $item->id,
                'table_name' => $item->table->table_name
            ];
        }

        $pending = [];
        $pending[] = [
            'total_pending' => $data->count(),
            'pending_table' => $pending_table
        ];

        return $pending;
    }

    public function waiteCookingOrder($user_id,$waiter_id) {
        $data = Order::where('order_date',date('Y-m-d'))->where('status',1)->where('user_id',$user_id)->where('waiter_id',$waiter_id)->get();
        $cooking_table = [];

        foreach($data as $item) {
            $cooking_table[] = [
                'order_id' => $item->id,
                'table_name' => $item->table->table_name
            ];
        }

        $coocking = [];
        $coocking[] = [
            'total_cooking' => $data->count(),
            'cooking_table' => $cooking_table
        ];

        return $coocking;
    }
    
    public function waiteReadyOrder($user_id,$waiter_id) {
        $data = Order::where('order_date',date('Y-m-d'))->where('status',2)->where('user_id',$user_id)->where('waiter_id',$waiter_id)->get();
        $ready_table = [];

        foreach($data as $item) {
            $ready_table[] = [
                'order_id' => $item->id,
                'table_name' => $item->table->table_name
            ];
        }

        $ready = [];
        $ready[] = [
            'total_ready' => $data->count(),
            'ready_table' => $ready_table
        ];

        return $ready;
    } 

    public function waiterStatusUpdate(Request $request) {
        Order::findOrFail($request->order_id)->update([
            'status' => $request->status
        ]);

        return response()->json([
            'data' => "Order Delivered"
        ]);
    }


    public function liveData($order_id) {
        return response()->json([
            'status' => Order::find($order_id)->status
        ]);
    }
}