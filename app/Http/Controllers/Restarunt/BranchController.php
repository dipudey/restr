<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index() {
        return view('restarunt.branch.index',[
            'chefs' => Chef::where('user_id',Auth::id())->orderBy('id','desc')->get(),
        ]);
    }

    public function create() {
        return view('restarunt.branch.create');
    }

    public function store(Request $request) {
        Chef::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('branch')->with('message',"New Chef Added Successfully");
    }

    public function edit($id) {
        return view('restarunt.branch.edit',[
            'chef' => Chef::find($id)
        ]);
    }

    public function update(Request $request) {
        Chef::find($request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);
        return redirect()->route('branch')->with('message'," Chef Information Updated");
    }

    public function destroy($id) {
        Chef::find($id)->delete();
        return back()->with('message',"Chef Deleted");
    }
}
