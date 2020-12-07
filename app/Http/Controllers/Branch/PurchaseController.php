<?php

namespace App\Http\Controllers\Branch;

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
        return view('branch.purchase.index',[
            'purchases' => Purchase::where('branch_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }

    public function create() {
        $branch = Branch::find(Auth::id());
        return view('branch.purchase.create',[
            'products' => Product::where('user_id',$branch->user_id)->orderBy('id','desc')->get(),
            'suppliers' => Supplier::where('user_id',$branch->user_id)->orderBy('id','desc')->get(),
        ]);
    }


    public function store(Request $request) {
        $branch = Branch::find(Auth::id());
        Purchase::insert([
            'user_id' => $branch->user_id,
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'branch_id' => Auth::id(),
            'product_cost' => $request->product_cost,
            'other_cost' => $request->other_cost,
            'total_cost' => ($request->product_cost + $request->other_cost),
            'product_quantity' => $request->product_quantity,
            'note' => $request->note,
            'purchase_date' => $request->purchase_date,
            'created_at' => Carbon::now()
        ]);
        
        return redirect()->route('branch.purchase')->with('message',"Product Purchase Successfully");
    }

    public function edit($id) {
        $branch = Branch::find(Auth::id());
        return view('branch.purchase.edit',[
            'products' => Product::where('user_id',$branch->user_id)->orderBy('id','desc')->get(),
            'purchase' => Purchase::find($id),
            'suppliers' => Supplier::where('user_id',$branch->user_id)->orderBy('id','desc')->get(),
        ]);
    }

    public function update(Request $request) {
        Purchase::find($request->id)->update([
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'product_cost' => $request->product_cost,
            'other_cost' => $request->other_cost,
            'total_cost' => ($request->product_cost + $request->other_cost),
            'product_quantity' => $request->product_quantity,
            'note' => $request->note,
            'purchase_date' => $request->purchase_date,
        ]);
        
        return redirect()->route('branch.purchase')->with('message',"Product Purchase Update Successfully");
    }


    public function destroy($id) {
        Purchase::find($id)->delete();
        return back()->with('message',"Purchase Product Deleted Successfully");
    }
}
