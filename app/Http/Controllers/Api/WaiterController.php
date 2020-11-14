<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WaiterCollection;
use App\Http\Requests\WaiterRequest;
use Illuminate\Http\Request;
use App\Models\Waiter;
use App\Models\Package;
use App\User;
use Carbon\Carbon;
use Hash;

class WaiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        return WaiterCollection::collection(Waiter::where('user_id',$user_id)->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WaiterRequest $request)
    {
        $restarunt = User::find($request->user_id);
        $package = Package::find($restarunt->package_id);
        $waiter = Waiter::where('user_id',$request->user_id)->count();

        if(filter_var($package->waiter, FILTER_VALIDATE_INT) == $waiter) {
            return response()->json([
                'errors' => "Waiter Limit Exceed"
            ]);
        }


        $waiter = Waiter::create([
            'user_id' => $request->user_id,
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        if($waiter) {
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
        $waiter = Waiter::findOrFail($id)->update([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        if($waiter) {
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
        $waiter = Waiter::findOrFail($id)->delete();

        if($waiter) {
            return true;
        }
    }
}
