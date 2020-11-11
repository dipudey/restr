<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;
use App\Models\Package;
use App\User;
use Hash;

class ResturantController extends Controller
{
    public function index() {
        return view('admin.restaurant.index',[
            'restaurants' => User::latest()->get(),
        ]);
    }

    public function create() {
        return view('admin.restaurant.create');
    }

    public function registration(RestaurantRequest $request) {

        $today_date = date('Y-m-d');
        $expaire_date = strtotime ( '+'.$request->expaire_month.' month' , strtotime ( $today_date ) );

        User::insert([
            'restaurant_name' => $request->restaurant_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'owner_name' => $request->owner_name,
            'website_link' => $request->website_link,
            'facebook_page' => $request->facebook_page,
            'city' => $request->city,
            'zip' => $request->zip,
            'country' => $request->country,
            'user_name' => $request->user_name,
            'expaier_date' => date('Y-m-d',$expaire_date),
            'package_id' => $request->package_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('restaurant')->with('message',"New Restaurant Registration Successfully");
    }

    public function edit($id) {
        return view('admin.restaurant.edit',[
            'restaurant' => User::find($id),
        ]);
    }

    public function update(Request $request) {

        User::find($request->id)->update([
            'restaurant_name' => $request->restaurant_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'owner_name' => $request->owner_name,
            'website_link' => $request->website_link,
            'facebook_page' => $request->facebook_page,
            'city' => $request->city,
            'zip' => $request->zip,
            'country' => $request->country,
            'user_name' => $request->user_name,
        ]);

        return redirect()->route('restaurant')->with('message',"Restaurant Information Updated Successfully");
    }

    public function destroy($id) {
        User::find($id)->delete();
        return back()->with('message',"Information Deleted Successfully");
    }

    public function package() {
        return view('admin.restaurant.package',[
            'packages' => Package::all(),
        ]);
    }
}
