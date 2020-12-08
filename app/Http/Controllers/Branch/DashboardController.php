<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\BranchFood;
use App\Models\Branch;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Reservation;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function index() {
        return view('branch.dashboard',[
            'today_order' => Order::where('branch_id',Auth::id())->where('order_date',date('Y-m-d'))->count(),
            'today_income' => OrderPayment::where('branch_id',Auth::id())->where('paying_date',date('Y-m-d'))->sum('paying_amount'),
            'month_income' => OrderPayment::where('branch_id',Auth::id())->whereMonth('paying_date',date('m'))->sum('paying_amount'),
            'today_reservation' => Reservation::where('reservation_date',date('Y-m-d'))->where('branch_id',Auth::id())->get(),
        ]);
    }

    public function pos() {
        return view('branch.pos.index');
    }

    public function foodList() {
        $branch = Branch::find(Auth::id());
        // dd($branch);
        return view('branch.foodList',[
            'foods' => Food::with('branchFood')->where('user_id',$branch->user_id)->get(),
            // 'foods' => Food::get(),
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


    public function profile() {
        return view('branch.profile',[
            'data' => Branch::find(Auth::id()),
        ]);
    }

    public function profileUpdate(Request $request) {
        Branch::find($request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return back()->with('message',"Profile Updated Successfully");
    }

    public function changePassword() {
        return view('branch.changePassword');
    }

    public function passwordUpdate(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if($request->old_password == $request->password) {
            return back()->with('samePassword','Your Old Password Can Not Be Your New Password.');
        }
        if (Hash::check($request->old_password,Auth::user()->password)) {
            User::find(Auth::id())->update([
                'password' => Hash::make($request->password),
            ]);
            return back()->with('message','Password Changed Successfully');
        }
        else {
            return back()->with('passwordError','Old Password Does Not Mathch.');
        }
  
    }
}
