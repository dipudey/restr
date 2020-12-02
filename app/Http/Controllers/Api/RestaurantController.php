<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaruntRegisterResource;
use App\User;
use App\Models\Payment;
use Carbon\Carbon;
use Hash;
use Symfony\Component\HttpFoundation\Response;

class RestaurantController extends Controller
{
    public function store(RestaurantRequest $request) {
        $today_date = date('Y-m-d');
        $expaire_date = strtotime ( '+'.$request->expaire_month.' month' , strtotime ( $today_date ) );
        
        $user_id = User::insertGetId([
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
        
        if($request->package_id != 1) {
            Payment::insert([
                'user_id' => $user_id,
                'payment_type' => $request->payment_type,
                'payment_to' => $request->payment_to,
                'transation' => $request->transation,
                'created_at' => Carbon::now(),
            ]);
        }

        return response(new RestaruntRegisterResource(User::find($user_id)),Response::HTTP_CREATED);
    }

    public function login(Request $request) {

        $validData = User::where('phone',$request->phone)->first();
        $password_check = password_verify($request->password,@$validData->password);
        if($password_check == false) {
            return response([
                'errors' => "Phone Number & Password Does Not Match"
            ],Response::HTTP_UNAUTHORIZED);
        }
        else{
            return response(new RestaruntRegisterResource($validData),Response::HTTP_OK);
        }
        
    }
}
