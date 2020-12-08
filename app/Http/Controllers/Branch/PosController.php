<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCategory;
use App\Models\Food;
use App\Models\BranchFood;
use App\Models\Branch;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\OrderPayment;
use Carbon\Carbon;
use Auth;

class PosController extends Controller
{
    public function pos() {
        $resturant = Branch::findOrFail(Auth::id());
        $cart_items = \DB::table('carts')
                                ->where('branch_id',Auth::id())
                                ->join('food','food.id',"=","carts.food_id")
                                ->select("carts.*",'food.food_name','food.discount_price','food.picture')
                                ->get();
        return view('branch.pos.index',[
            'categories' => FoodCategory::where('user_id',$resturant->user_id)->get(),
            'foods' => BranchFood::where('branch_id',Auth::id())->where('status',1)->get(),
            'customers' => Customer::where('branch_id',Auth::id())->orderBy('id','desc')->get(),
        ]);
    }


    public function foodCategory(Request $request) {
        if($request->id == "all") {
            $foods = \DB::table('branch_food')
                            ->join('food','food.id',"=",'branch_food.food_id')
                            ->where('branch_id',Auth::id())
                            ->where('status',1)
                            ->get();
                            return response()->json($foods);
        }
        else {
            $foods = \DB::table('food')
                            ->join('branch_food','branch_food.food_id',"=",'food.id')
                            ->where('food_category_id',$request->id)
                            ->where('branch_id',Auth::id())
                            ->where('status',1)
                            ->get();


            return response()->json($foods);
        }
        
    } 


    public function cart(Request $request) {

        if(Cart::where('branch_id',Auth::id())->where('food_id',$request->food_id)->exists()) {
            $data = Cart::where('branch_id',Auth::id())->where('food_id',$request->food_id);
            $data->increment('qty',1);
            $data->increment('total_price',$request->price);

            $cart_items = \DB::table('carts')
                                ->where('branch_id',Auth::id())
                                ->join('food','food.id',"=","carts.food_id")
                                ->select("carts.*",'food.food_name','food.discount_price','food.picture')
                                ->get();

            return response()->json([
                'cart' => $cart_items,
                'total' => $cart_items->sum('total_price')
            ]);
        }
        else {
            Cart::insert([
                'branch_id' => Auth::id(),
                'food_id' => $request->food_id,
                'qty' => 1,
                'price' => $request->price,
                'total_price' => $request->price * 1,
                'created_at' => Carbon::now()
            ]);

            $cart_items = \DB::table('carts')
                                ->where('branch_id',Auth::id())
                                ->join('food','food.id',"=","carts.food_id")
                                ->select("carts.*",'food.food_name','food.discount_price','food.picture')
                                ->get();

            return response()->json([
                'cart' => $cart_items,
                'total' => $cart_items->sum('total_price')
            ]);
        }
    }

    public function cartRemove($id) {
        Cart::find($id)->delete();

        $cart_items = \DB::table('carts')
                                ->where('branch_id',Auth::id())
                                ->join('food','food.id',"=","carts.food_id")
                                ->select("carts.*",'food.food_name','food.discount_price','food.picture')
                                ->get();

        return response()->json([
            'cart' => $cart_items,
            'total' => $cart_items->sum('total_price')
        ]);
    }

    public function cartList() {
        $cart_items = \DB::table('carts')
                                ->where('branch_id',Auth::id())
                                ->join('food','food.id',"=","carts.food_id")
                                ->select("carts.*",'food.food_name','food.discount_price','food.picture')
                                ->get();

        return response()->json([
            'cart' => $cart_items,
            'total' => $cart_items->sum('total_price')
        ]);
    }

    public function increment($id) {
        $data = Cart::find($id);
        $data->increment('qty',1);
        $data->increment('total_price',$data->price);
        $cart_items = \DB::table('carts')
                                ->where('branch_id',Auth::id())
                                ->join('food','food.id',"=","carts.food_id")
                                ->select("carts.*",'food.food_name','food.discount_price','food.picture')
                                ->get();
        return response()->json([
            'price' => $data,
            'total' => $cart_items->sum('total_price') 
        ]);
    }


    public function decrement($id) {
        $data = Cart::find($id);
        $data->decrement('qty',1);
        $data->decrement('total_price',$data->price);
        $cart_items = \DB::table('carts')
                                ->where('branch_id',Auth::id())
                                ->join('food','food.id',"=","carts.food_id")
                                ->select("carts.*",'food.food_name','food.discount_price','food.picture')
                                ->get();
        return response()->json([
            'price' => $data,
            'total' => $cart_items->sum('total_price') 
        ]);
    }

    public function sale(Request $request) {

        $branch_info = Branch::find(Auth::id());
        $cart = Cart::where('branch_id',Auth::id())->get();
        // Order Added
        $order_id = Order::insertGetId([
            'user_id' => $branch_info->user_id,
            'branch_id' => Auth::id(),
            'customer_id' => $request->customer_id,
            'order_date' => date('Y-m-d'),
            'order_time' => date('h:i:s', time()),
            'total_price' => $cart->sum('total_price'),
            'status' => 4,
            'created_at' => Carbon::now() 
        ]);
        // OrderFood 
        foreach($cart as $item) {
            OrderFood::insert([
                'order_id' => $order_id,
                'food_id' => $item->food_id,
                'price' => $item->price,
                'qty' => $item->qty,
                'total_price' => $item->total_price,
                'status' => 2,
                'created_at' => Carbon::now()
            ]);
        }
        // Order Payment
        OrderPayment::insert([
            'user_id' => $branch_info->user_id,
            'branch_id' => Auth::id(),
            'order_id' => $order_id,
            'payment_type' => $request->payment_type,
            'paying_amount' => $cart->sum('total_price'),
            'paying_date' => date('Y-m-d'),
            'created_at' => Carbon::now()
        ]);
        // Cart Food Delete
        Cart::where('branch_id',Auth::id())->delete();
        return back();
    }

}
