<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Waiter;
use App\Models\BranchFood;
use App\Models\Food;
use App\Http\Resources\FoodCollection;


// today sale
// monthly sale 

class DashboardController extends Controller
{
    public function branchDashboard($branch_id) {
        $today_order = \DB::table('orders')
                        ->join('order_food','orders.id',"=","order_food.order_id")
                        ->select("*")
                        ->where('branch_id',$branch_id)
                        ->where('order_date',date("Y-m-d"))
                        ->sum(\DB::raw('qty * price'));
        $monthly_sale = \DB::table('orders')
                        ->join('order_food','orders.id',"=","order_food.order_id")
                        ->select("*")
                        ->where('branch_id',$branch_id)
                        ->whereMonth('order_date',date("m"))
                        ->sum(\DB::raw('qty * price'));

        return response()->json([
            'today_sale' => $today_order,
            'monthly_sale' => $monthly_sale,
            // 'today_waiter_order' => 
        ]);
    }

    public function waiterOrder($branch_id) {
        $today_waiter_order = [];
        $waiters = Waiter::with('order')->where('branch_id',$branch_id)->get();

        foreach($waiters as $waiter) {
            $today_waiter_order[] = [
                'id' => $waiter->id, 
                'waiter_name' => $waiter->name,
                'sale_amount' => $this->waiterSaleAmount($waiter->id),
            ];
        }


        return response()->json([
            'data' => $today_waiter_order
        ]);

    }

    public function popularFood($branch_id) {
        // return $user_id;
        $food_order = \DB::table('order_food')
                                ->select('food_id',\DB::raw('COUNT(food_id) as total_sale'))
                                ->groupBy('food_id')
                                ->orderBy('total_sale', 'desc')
                                ->take(10)
                                ->get();

        $popular_food = [];
        foreach ($food_order as $food) {
            if(BranchFood::where('food_id',$food->food_id)->where('branch_id',$branch_id)->get()) {
                $data = Food::find($food->food_id);
                $popular_food[] = [
                    'total_sell' => $food->total_sale,
                    'food_id' => $data->id,
                    'food_name' => $data->food_name,
                    'food_category' => $data->category->category_name,
                    'price' => $data->price,
                    'discount_percentage' => $data->discount_percentage,
                    'discount_amount' => $data->discount_amount,
                    'discount_price' => $data->discount_price,
                    'picture' => "/uploads/".$data->picture
                ];
            }
            
        }

        return response()->json([
            'foods' => $popular_food
        ]);
    }


    private function branchFood($food_id,$branch_id) {
        $data = BranchFood::where('food_id',$food_id)->where('branch_id',$branch_id)->get();
        return $data;
    }
 

    private function waiterSaleAmount($waiter_id) {
        $today_order = \DB::table('orders')
                        ->join('order_food','orders.id',"=","order_food.order_id")
                        ->select("*")
                        ->where('waiter_id',$waiter_id)
                        ->where('order_date',date("Y-m-d"))
                        ->sum(\DB::raw('qty * price'));
        return $today_order;
    }
}
