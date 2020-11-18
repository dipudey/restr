<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CheckBranchFoodCollection;
use App\Http\Resources\BranchFoodCollection;
use App\Models\FoodCategory;
use App\Models\BranchFood;
use App\Models\Food;
use Carbon\Carbon;

class BranchFoodController extends Controller
{


    public function categoryWishFood($user_id) {

        $result = [];
        $categories= FoodCategory::where('user_id',$user_id)->get();

        foreach($categories as $category) {
            $result[] = [
                'id' => $category->id,
                'user_id' => $category->user_id,
                'category_name' => $category->category_name,
                'foods' => CheckBranchFoodCollection::collection(\DB::table('food')
                                                                        ->select('*')
                                                                        ->where('food_category_id',$category->id)
                                                                        ->get()),
            ];
        }

        return response()->json([
            'data' => $result
        ]);
    }

    public function branchFoodList($user_id,$branch_id) {
        $result = [];
        $categories= FoodCategory::where('user_id',$user_id)->get();

        foreach($categories as $category) {
            $result[] = [
                'id' => $category->id,
                'user_id' => $category->user_id,
                'category_name' => $category->category_name,
                'foods' => BranchFoodCollection::collection(\DB::table('food')
                                                                    ->join('branch_food','branch_food.food_id','=','food.id')
                                                                    ->select('*')
                                                                    ->where('branch_id',$branch_id)
                                                                    ->where('food_category_id',$category->id)
                                                                    ->get()),
            ];
        }

        return response()->json([
            'data' => $result
        ]);
    }


    public function deleteFood($branch_food_id) {
        BranchFood::findOrFail($branch_food_id)->delete();
        return response()->json([
            'message' => "Branch Food Deleted Successfully"
        ]);
    }

    public function foodStatusUpdated(Request $request,$branch_food_id) {
       $result = BranchFood::findOrFail($branch_food_id)->update([
            'status' => $request->status,
        ]);

        if ($result) {
            return true;
        }
    }

    public function branchFoodAdd($branch_id,$food_id) {
        if(BranchFood::where('food_id',$food_id)->where('branch_id',$branch_id)->exists()) {
            return response()->json([
                'errors' => "This Food Added Already This Branch"
            ]);
        }
        else{
            BranchFood::insert([
                'food_id' => $food_id,
                'branch_id' => $branch_id,
                'created_at' => Carbon::now()
            ]);
            return response()->json([
                'data' => 'Food Added This Branch'
            ]);
        }
    }
}
