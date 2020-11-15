<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChefCollection;
use App\Http\Resources\ChefResource;
use App\Http\Requests\ChefRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Chef;
use Carbon\Carbon;
use Hash;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        return ChefCollection::collection(Chef::where('user_id',$user_id)->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChefRequest $request)
    {
        $chef = Chef::create([
            'user_id' => $request->user_id,
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        if($chef) {
            return true;
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $chef = Chef::findOrFail($id)->update([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        if($chef) {
            return true;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chef = Chef::findOrFail($id)->delete();

        if($chef) {
            return true;
        }
    }


    public function login(Request $request) {
        $validData = Chef::where('phone',$request->phone)->first();
        $password_check = password_verify($request->password,@$validData->password);
        if($password_check == false) {
            return response([
                'errors' => "Phone Number & Password Does Not Match"
            ],Response::HTTP_UNAUTHORIZED);
        }
        else{
            return response(new ChefResource($validData),Response::HTTP_OK);
        }
    }
}
