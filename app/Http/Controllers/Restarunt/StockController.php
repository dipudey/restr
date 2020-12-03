<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use Auth;

class StockController extends Controller
{
    public function index() {
        return view('restarunt.stock.index',[
            'products' => Product::where('user_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }
}
