<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCategory;
use App\Models\Food;
use App\Models\BranchFood;
use App\Models\Branch;
use Auth;

class PosController extends Controller
{
    public function pos() {
        $resturant = Branch::findOrFail(Auth::id());
        // dd(BranchFood::where('branch_id',Auth::id())->where('status',1)->get());
        return view('branch.pos.index',[
            'categories' => FoodCategory::where('user_id',$resturant->user_id)->get(),
            'foods' => BranchFood::where('branch_id',Auth::id())->where('status',1)->get(),
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
}
