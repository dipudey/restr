<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\FoodCategory;
use Carbon\Carbon;
use Auth;
use Image;

class FoodController extends Controller
{
    public function index() {
        return view('restarunt.food.index',[
            'foods' => Food::where('user_id',Auth::id())->orderBy('id','desc')->get(),
        ]);
    }
        
    public function create() {
        return view('restarunt.food.create',[    
            'categories' => FoodCategory::where('user_id',Auth::id())->get(),
        ]);
    }

    public function store(Request $request) {
        if($request->discount) {
            $discount_price = $request->price - (($request->discount * $request->price)/100);
        }
        else {
            $discount_price = null;
        }

        Food::insert([
            'food_category_id' => $request->food_category_id,
            'user_id' => Auth::id(),
            'food_name' => $request->food_name,
            'price' => $request->price,
            'discount' => $request->discount,
            'discount_price' => $discount_price,
            'picture' => $this->imageUpload($request->file('picture')),
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('food')->with('message',"New Food Added Successfully");
    }

    public function edit($id) {
        return view('restarunt.food.edit',[    
            'categories' => FoodCategory::where('user_id',Auth::id())->get(),
            'food' => Food::find($id)
        ]);
    }

    public function update(Request $request) {
        $food = Food::find($request->id);
        if($request->file('picture')) {
            $delete_location = base_path('public/uploads/'.$food->picture);
            unlink($delete_location);
            $food->update([
                'picture' => $this->imageUpload($request->file('picture'))
            ]);
        }

        if($request->discount) {
            $discount_price = $request->price - (($request->discount * $request->price)/100);
        }
        else {
            $discount_price = null;
        }

        $food->update([
            'food_category_id' => $request->food_category_id,
            'user_id' => Auth::id(),
            'food_name' => $request->food_name,
            'price' => $request->price,
            'discount' => $request->discount,
            'discount_price' => $discount_price,
            'status' => $request->status,
        ]);
        return redirect()->route('food')->with('message',"Food Updated Successfully");
    }

    public function destroy($id) {
        $food = Food::find($id);
        $delete_location = base_path('public/uploads/'.$food->picture);
        unlink($delete_location);
        $food->delete();
        return back()->with('message','Food Deleted Successfully');
    }

    private function imageUpload($file) {
        $name = uniqid().".".$file->getClientOriginalExtension();
        $upload_location = base_path('public/uploads/'.$name);
        Image::make($file)->save($upload_location);
        return $name;
    }
}
