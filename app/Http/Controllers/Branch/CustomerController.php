<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Auth;

class CustomerController extends Controller
{
    public function index() {
        return view('branch.customer.index',[
            'customers' => Customer::where('branch_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }

    public function store(Request $request) {
        Customer::insert([
            'branch_id' => Auth::id(),
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);
        
        return back()->with('message',"New Customer Added Successfully");
    }

    public function edit($id) {
        return view('branch.customer.edit',[
            'customer' => Customer::find($id),
            'customers' => Customer::where('branch_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }

    public function update(Request $request) {
        Customer::find($request->id)->update([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
        ]);
        return redirect()->route('customer')->with('message',"Customer Info update Successfully");
    }

    public function destroy($id) {
        Customer::find($id)->delete();
        return back()->with('message',"Customer Deleted Successfully");
    } 
}
