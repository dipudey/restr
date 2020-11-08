<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Waiter;
use Auth;
use Hash;
use Carbon\Carbon;

class WaiterController extends Controller
{
    public function index() {
        return view('restarunt.waiter.index',[
            'waiters' => Waiter::where('user_id',Auth::id())->orderBy('id','desc')->get(),
        ]);
    }

    public function create() {
        return view('restarunt.waiter.create');
    }

    public function store(Request $request) {
        Waiter::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('waiter')->with('message',"New Waiter Added Successfully");
    }

    public function edit($id) {
        return view('restarunt.waiter.edit',[
            'waiter' => Waiter::find($id)
        ]);
    }

    public function update(Request $request) {
        Waiter::find($request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);
        return redirect()->route('waiter')->with('message',"Waiter Information Updated");
    }

    public function destroy($id) {
        Waiter::find($id)->delete();
        return back()->with('message',"Waiter Deleted");
    }
}
