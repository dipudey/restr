<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;
use Auth;

class PurchaseController extends Controller
{
    public function index() {
        return view('restarunt.purchase.index',[
            'purchases' => Purchase::where('user_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }

    public function create() {
        return view('restarunt.purchase.create',[
            'products' => Product::where('user_id',Auth::id())->orderBy('id','desc')->get(),
            'suppliers' => Supplier::where('user_id',Auth::id())->orderBy('id','desc')->get(),
            'branches' => Branch::where('user_id',Auth::id())->get(),
        ]);
    }


    public function store(Request $request) {
        Purchase::insert([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'branch_id' => $request->branch_id,
            'product_cost' => $request->product_cost,
            'other_cost' => $request->other_cost,
            'total_cost' => ($request->product_cost + $request->other_cost),
            'product_quantity' => $request->product_quantity,
            'note' => $request->note,
            'purchase_date' => $request->purchase_date,
            'created_at' => Carbon::now()
        ]);
        
        return redirect()->route('purchase')->with('message',"Product Purchase Successfully");
    }

    public function edit($id) {
        return view('restarunt.purchase.edit',[
            'products' => Product::where('user_id',Auth::id())->orderBy('id','desc')->get(),
            'branches' => Branch::where('user_id',Auth::id())->get(),
            'purchase' => Purchase::find($id),
            'suppliers' => Supplier::where('user_id',Auth::id())->orderBy('id','desc')->get(),
        ]);
    }

    public function update(Request $request) {
        Purchase::find($request->id)->update([
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'branch_id' => $request->branch_id,
            'product_cost' => $request->product_cost,
            'other_cost' => $request->other_cost,
            'total_cost' => ($request->product_cost + $request->other_cost),
            'product_quantity' => $request->product_quantity,
            'note' => $request->note,
            'purchase_date' => $request->purchase_date,
        ]);
        
        return redirect()->route('purchase')->with('message',"Product Purchase Update Successfully");
    }


    public function destroy($id) {
        Purchase::find($id)->delete();
        return back()->with('message',"Purchase Product Deleted Successfully");
    }
}
