<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Branch;
use App\Models\StockOut;
use Carbon\Carbon;
use Auth;

class StockController extends Controller
{
    public function stockOut() {
        return view('branch.stock.out');
    }

    public function stock() {
        $branch = Branch::find(Auth::id());
        return view('branch.stock.stock',[
            'products' => Product::where('user_id',$branch->user_id)->orderBy('id','desc')->get()
        ]);
    }

    public function out(Request $request) {
        $orderItem = [];
        foreach($request->product_id as $key => $vlaue) {
            $orderItem[] = [
                'branch_id' => Auth::id(),
                'product_id' => $vlaue,
                'quantity' => $request->quantity[$key],
                'out_date' => date('Y-m-d'),
                'created_at' => Carbon::now()
            ];
        }

        StockOut::insert($orderItem);

        return back()->with('message',"Stock Out Successfully");
    }

    public function product() {
        $branch = Branch::find(Auth::id());
        return response()->json(Product::where('user_id',$branch->user_id)->get());
    }

    public function productDetails($product_id) {
        return response()->json(Product::find($product_id));
    }
}
