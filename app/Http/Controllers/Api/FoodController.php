<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCollection;
use App\Models\Food;
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

        if($request->discount) {
            $discount_price = $request->price - (($request->discount * $request->price)/100);
        }
        else {
            $discount_price = null;
        }

        $food = Food::insert([
            'food_category_id' => $request->food_category_id,
            'user_id' => $request->user_id,
            'food_name' => $request->food_name,
            'price' => $request->price,
            'discount' => $request->discount,
            'discount_price' => $discount_price,
            'picture' => $this->imageUpload($request->file('picture')),
            'status' => $request->status,
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

        if($request->discount) {
            $discount_price = $request->price - (($request->discount * $request->price)/100);
        }
        else {
            $discount_price = null;
        }

        $success = $food->update([
            'food_category_id' => $request->food_category_id,
            'food_name' => $request->food_name,
            'price' => $request->price,
            'discount' => $request->discount,
            'discount_price' => $discount_price,
            'status' => $request->status,
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

    private function imageUpload($file) {
        $name = uniqid().".".$file->getClientOriginalExtension();
        $upload_location = base_path('public/uploads/'.$name);
        Image::make($file)->save($upload_location);
        return $name;
    }
}
