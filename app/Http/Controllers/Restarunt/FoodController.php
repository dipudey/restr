<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\FoodCategory;
use Carbon\Carbon;
use Auth;

class FoodController extends Controller
{
    public function index() {
        return view('restarunt.food.index',[
            'foods' => Food::where('user_id',Auth::id())->latest()->get(),
            'categories' => FoodCategory::where('user_id',Auth::id())->get(),
        ]);
    }
}
