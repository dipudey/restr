<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCategoryCollection;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        return FoodCategoryCollection::collection(FoodCategory::where('user_id',$user_id)->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food_category = FoodCategory::insert([
            'user_id' => $request->user_id,
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);
        
        if($food_category) {
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
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = FoodCategory::find($id)->update([
            'category_name' => $request->category_name
        ]);

        if($category) {
            return true;
        }
        else{
            return false;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = FoodCategory::find($id)->delete();
        if($delete) {
            return true;
        }
        else{
            return false;
        }
    }
}
