<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCategory;
use Carbon\Carbon;
use Auth;

class FoodCategoryController extends Controller
{
    public function index() {
        return view('restarunt.category.index',[
            'categories' => FoodCategory::where('user_id',Auth::id())->latest()->get()
        ]);
    }

    public function store(Request $request) {
        FoodCategory::insert([
            'user_id' => Auth::id(),
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message',"New Food Category Added Successfully");
    }

    public function edit($id) {
        return response()->json(FoodCategory::find($id));
    }

    public function update(Request $request) {
        FoodCategory::find($request->id)->update([
            'category_name' => $request->category_name
        ]);
        return back()->with('message',"Food Category Updated");
    }

    public function destroy($id) {
        FoodCategory::find($id)->delete();
        return back()->with('message',"Food Category Deleted Successfully");
    }
}
