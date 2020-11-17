<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCollection;
use App\Http\Resources\FoodCategoryCollection;
use App\Http\Resources\CategoryWishFoodCollection;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id) 
    {
        return Foodcollection::collection(Food::where('user_id',$user_id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'food_category_id' => 'required',
            'food_name' => 'required',
            'price' => 'required',
            'picture' => 'required|mimes:jpg,jpeg,png',
        ],[
            'food_category_id.required' => "Food Category Field Is Required"
        ]);

        if($request->discount_type == 1) {
            $discount_price = $request->price - (($request->discount * $request->price)/100);
        }
        else{
            $discount_price = $request->price - $request->discount;
        }

        $food = Food::insert([
            'food_category_id' => $request->food_category_id,
            'user_id' => $request->user_id,
            'food_name' => $request->food_name,
            'price' => $request->price,
            'discount_percentage' => $request->discount_type == 1?$request->discount:Null,
            'discount_amount' => $request->discount_type == 2?$request->discount:Null,
            'discount_price' => $discount_price,
            'picture' => $this->imageUpload($request->file('picture')),
            'created_at' => Carbon::now()
        ]);

        if($food) {
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        if($request->file('picture')) {
            $delete_location = base_path('public/uploads/'.$food->picture);
            unlink($delete_location);
            $food->update([
                'picture' => $this->imageUpload($request->file('picture'))
            ]);
        }

        if($request->discount_type == 1) {
            $discount_price = $request->price - (($request->discount * $request->price)/100);
        }
        else{
            $discount_price = $request->price - $request->discount;
        }

        $success = $food->update([
            'food_category_id' => $request->food_category_id,
            'food_name' => $request->food_name,
            'price' => $request->price,
            'discount_percentage' => $request->discount_type == 1?$request->discount:Null,
            'discount_amount' => $request->discount_type == 2?$request->discount:Null,
            'discount_price' => $discount_price
        ]);

        if($success) {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $food = Food::find($id);
        $delete_location = base_path('public/uploads/'.$food->picture);
        unlink($delete_location);
        $success = $food->delete();
        if($success) {
            return true;
        }
        else{
            return false;
        }
    }

    public function categoryWiseFood($user_id,$branch_id) {
        $result = [];
        $categories= FoodCategory::where('user_id',$user_id)->get();

        foreach($categories as $category) {
            $result[] = [
                'id' => $category->id,
                'user_id' => $category->user_id,
                'category_name' => $category->category_name,
                'foods' => CategoryWishFoodCollection::collection(\DB::table('food')
                                                                        ->join('branch_food','branch_food.food_id','=','food.id')
                                                                        ->select('*')
                                                                        ->where('branch_id',$branch_id)
                                                                        ->where('food_category_id',$category->id)
                                                                        ->get())
            ];
        }
    
        // return $result;
        return response()->json([
            'data' => $result
        ]);

    }


    private function imageUpload($file) {
        $name = uniqid().".".$file->getClientOriginalExtension();
        $upload_location = base_path('public/uploads/'.$name);
        Image::make($file)->save($upload_location);
        return $name;
    }
}
