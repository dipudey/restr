<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Admin;
Use App\User;
use Hash;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        return view('admin.dashboard',[
            'total_restaurant' => User::all(),
        ]);
    }

    public function changePassword() {
        return view('admin.changePassowrd');
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
            Admin::find(Auth::id())->update([
                'password' => Hash::make($request->password),
            ]);
            return back()->with('message','Password Changed Successfully');
        }
        else {
            return back()->with('passwordError','Old Password Does Not Mathch.');
        }
  
    }
}
