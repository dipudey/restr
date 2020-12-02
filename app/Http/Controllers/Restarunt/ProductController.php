<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Auth;

class ProductController extends Controller
{
    public function index() {
        return view('restarunt.product.index',[
            'products' => Product::where('user_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }


    public function store(Request $request) {
        Product::insert([
            'user_id' => Auth::id(),
            'product_name' => $request->product_name,
            'product_attribute' => $request->product_attribute,
            'product_type' => $request->productType,
            'buying_price' => $request->bying_price,
            'selling_price' => $request->selling_price,
            'created_at' => Carbon::now()
        ]);
        
        return back()->with('message',"New Product Added Successfully");
    }

    public function edit($id) {
        return view('restarunt.product.edit',[
            'product' => Product::find($id),
            'products' => Product::where('user_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }

    public function update(Request $request) {
        Product::find($request->id)->update([
            'product_name' => $request->product_name,
            'product_attribute' => $request->product_attribute,
            'product_type' => $request->productType,
            'buying_price' => $request->bying_price,
            'selling_price' => $request->productType == 1 ? NULL : $request->selling_price,
        ]);
        
        return redirect()->route('product')->with('message',"Product update Successfully");
    }


    public function destroy($id) {
        Product::find($id)->delete();
        return back()->with('message',"Product Deleted Successfully");
    } 
}
