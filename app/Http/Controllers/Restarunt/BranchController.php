<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use Carbon\Carbon;
use Auth;
use Hash;

class BranchController extends Controller
{
    public function index() {
        return view('restarunt.branch.index',[
            'branches' => Branch::where('user_id',Auth::id())->orderBy('id','desc')->get(),
        ]);
    }

    public function create() {
        return view('restarunt.branch.create');
    }

    public function store(Request $request) {
        Branch::insert([
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
            'branch' => Branch::find($id)
        ]);
    }

    public function update(Request $request) {
        Branch::find($request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);
        return redirect()->route('branch')->with('message'," Branch Information Updated");
    }

    public function destroy($id) {
        Branch::find($id)->delete();
        return back()->with('message',"Branch Deleted");
    }
}
