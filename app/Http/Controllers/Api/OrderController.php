<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\Food;
use App\Http\Resources\ChefTodayOrderCollection;
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
    
    public function foodReOrder(Request $request) {
        Order::find($request->order_id)->update(['status' => 0]);
        $food_list = [];
        for($i = 0;$i < count($request->foods);$i++) {
            $food_list[] = [
                'order_id' => $request->order_id,
                'food_id' => $request->foods[$i]['food_id'],
                'price' => $request->foods[$i]['price'],
                'qty' => $request->foods[$i]['qty'],
                'total_price' => ($request->foods[$i]['qty']*$request->foods[$i]['price']),
                'created_at' => Carbon::now()
            ];
        }

        OrderFood::insert($food_list);
        
        return response()->json([
           'data' => "Food Re-Order Successfully" 
        ]);
    }

    public function chefTodayOrder($user_id,$branch_id){
        return ChefTodayOrderCollection::collection(Order::where('order_date',date('Y-m-d'))->where('user_id',$user_id)->where('branch_id',$branch_id)->orderBy('id','desc')->get());
    }
    
    public function waiterTodayOrder($waiter_id) {
        return ChefTodayOrderCollection::collection(Order::where('order_date',date('Y-m-d'))->where('waiter_id',$waiter_id)->where('status',"<=",3)->orderBy('id','desc')->get());
    }
    
    public function statusUpdate(Request $request) {
        
        $data = Order::findOrFail($request->order_id);
        
        if($data->status == 0) {
            Order::findOrFail($request->order_id)->increment('status',$request->status);
            OrderFood::where('order_id',$request->order_id)->where('status',0)->increment('status',$request->status);
        }
        elseif($data->status == 1) {
            Order::findOrFail($request->order_id)->increment('status',$request->status);
            OrderFood::where('order_id',$request->order_id)->where('status',1)->increment('status',$request->status);
        }
        elseif($data->status == 2) {
            Order::findOrFail($request->order_id)->increment('status',$request->status);
            OrderFood::where('order_id',$request->order_id)->where('status',2)->increment('status',$request->status);
        }
        elseif($data->status == 3) {
            Order::findOrFail($request->order_id)->increment('status',$request->status);
            OrderFood::where('order_id',$request->order_id)->where('status',2)->increment('status',$request->status);
        }
        

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

        // return $pending;
        return response()->json([
                'data' => $pending
            ]);
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

        // return $coocking;
        return response()->json(['data'=> $coocking]);
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

       // return $ready;
        return response()->json(['data'=> $ready]);
    } 
    
    
    public function todayOrderStatusList($waiter_id) {
        $list = [];
        $list[] = [
            'ready' => Order::where('order_date',date('Y-m-d'))->where('status',2)->where('waiter_id',$waiter_id)->count(),    
            'coocking' => Order::where('order_date',date('Y-m-d'))->where('status',1)->where('waiter_id',$waiter_id)->count(),    
            'pending' => Order::where('order_date',date('Y-m-d'))->where('status',0)->where('waiter_id',$waiter_id)->count(),    
            'delivered' => Order::where('order_date',date('Y-m-d'))->where('status',3)->where('waiter_id',$waiter_id)->count(),    
        ];
        
        
        return response()->json(['data' => $list]);
    }
    
    
    public function chefTodayOrderStatusList($user_id,$branch_id) {
        $list = [];
        $list[] = [
            'ready' => Order::where('order_date',date('Y-m-d'))->where('status',2)->where('branch_id',$branch_id)->where('user_id',$user_id)->count(),    
            'coocking' => Order::where('order_date',date('Y-m-d'))->where('status',1)->where('branch_id',$branch_id)->where('user_id',$user_id)->count(),    
            'pending' => Order::where('order_date',date('Y-m-d'))->where('status',0)->where('branch_id',$branch_id)->where('user_id',$user_id)->count(),    
            'delivered' => Order::where('order_date',date('Y-m-d'))->where('status',3)->where('branch_id',$branch_id)->where('user_id',$user_id)->count(),    
        ];
        
        
        return response()->json(['data' => $list]);
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