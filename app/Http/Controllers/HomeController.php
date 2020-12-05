<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Expense;
use App\Models\Branch;
use App\User;
use App\Models\Reservation;
use Auth;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today_income = \DB::table('orders')
                            ->join('order_food','order_food.order_id','=','orders.id')
                            ->where(['order_date' => date('Y-m-d'),'user_id' => Auth::id()])
                            ->get();
        $monthly_income = \DB::table('orders')
                            ->join('order_food','order_food.order_id','=','orders.id')
                            ->whereMonth('order_date',date('m'))
                            ->where('user_id',Auth::id())
                            ->get();


        return view('home',[
            'today_order' => Order::where('user_id',Auth::id())->where('order_date',date('Y-m-d'))->count(),
            'today_expense' => Expense::where('user_id',Auth::id())->where('expense_date',date('Y-m-d'))->sum('amount'),
            'today_income' => $today_income->sum('total_price'),
            'monthly_expense' => Expense::where('user_id',Auth::id())->whereMonth('expense_date',date('m'))->sum('amount'),
            'monthly_income' => $monthly_income->sum('total_price'), 
            'branches' => Branch::where('user_id',Auth::id())->get(),
            'today_reservation' => Reservation::where('reservation_date',date('Y-m-d'))->where('user_id',Auth::id())->get(),
        ]);
    }



    public function profile() {
        return view('restarunt.profile.profile',[
            'data' => User::find(Auth::id()),
        ]);
    }


    public function profileUpdate(Request $request) {
        User::find($request->id)->update([
            'restaurant_name' => $request->restaurant_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'owner_name' => $request->owner_name,
            'website_link' => $request->website_link,
            'facebook_page' => $request->facebook_page,
            'city' => $request->city,
            'zip' => $request->zip,
            'user_name' => $request->user_name,
        ]);

        return back()->with('message',"Profile Updated Successfully");
    }

    public function changePassword() {
        return view('restarunt.profile.changePassword');
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
