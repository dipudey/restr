<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\BranchFood;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function index() {
        return view('branch.dashboard');
    }

    public function foodList() {
        return view('branch.foodList',[
            'foods' => Food::with('branchFood')->get(),
        ]);
    }

    public function branchFoodAdd(Request $request) {
        if(BranchFood::where('food_id',$request->food_id)->where('branch_id',Auth::id())->exists()) {
            BranchFood::where('food_id',$request->food_id)->where('branch_id',Auth::id())->delete();
            return response()->json('Food Deleted This Branch');
        }
        else{
            BranchFood::insert([
                'food_id' => $request->food_id,
                'branch_id' => Auth::id(),
                'created_at' => Carbon::now()
            ]);
            return response()->json('Food Added This Branch');
        }
    }

    public function branchFoodStatus(Request $request) {
        if(BranchFood::where('food_id',$request->food_id)->where('branch_id',Auth::id())->exists()) {
            if(BranchFood::where('food_id',$request->food_id)->where('branch_id',Auth::id())->first()->status == 0) {
                BranchFood::where('food_id',$request->food_id)->where('branch_id',Auth::id())->update(['status' => 1]);
                return response()->json('This Food Is Avilable');
            }
            else {
                BranchFood::where('food_id',$request->food_id)->where('branch_id',Auth::id())->update(['status' => 0]);
                return response()->json('This Food Is Unavailable');
            }
        }
        else{
            return response()->json([
                'error' => 'This Food is not Available in this Branch'
            ]);
        }
    }
}
