<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chef;
use App\Models\Branch;
use Auth;
use Hash;
use Carbon\Carbon;

class ChefController extends Controller
{
    public function index() {
        return view('restarunt.chef.index',[
            'chefs' => Chef::where('user_id',Auth::id())->orderBy('id','desc')->get(),
        ]);
    }

    public function create() {
        return view('restarunt.chef.create',[
            'branches' => Branch::where('user_id',Auth::id())->get(),
        ]);
    }

    public function store(Request $request) {
        Chef::insert([
            'user_id' => Auth::id(),
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('chef')->with('message',"New Chef Added Successfully");
    }

    public function edit($id) {
        return view('restarunt.chef.edit',[
            'chef' => Chef::find($id),
            'branches' => Branch::where('user_id',Auth::id())->get(),
        ]);
    }

    public function update(Request $request) {
        Chef::find($request->id)->update([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);
        return redirect()->route('chef')->with('message'," Chef Information Updated");
    }

    public function destroy($id) {
        Chef::find($id)->delete();
        return back()->with('message',"Chef Deleted");
    }
}
