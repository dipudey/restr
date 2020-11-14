<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BranchCollection;
use App\Http\Resources\BranchResource;
use App\Http\Requests\BranchRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Branch;
use Carbon\Carbon;
use Hash;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        return BranchCollection::collection(Branch::where('user_id',$user_id)->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        $branch = Branch::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        if($branch) {
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

        $branch = Branch::findOrFail($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        if($branch) {
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
        $branch = Branch::findOrFail($id)->delete();

        if($branch) {
            return true;
        }
    }

    public function login(Request $request) {
        $validData = Branch::where('phone',$request->phone)->first();
        $password_check = password_verify($request->password,@$validData->password);
        if($password_check == false) {
            return response([
                'errors' => "Phone Number & Password Does Not Match"
            ],Response::HTTP_UNAUTHORIZED);
        }
        else{
            return response(new BranchResource($validData),Response::HTTP_OK);
        }
    }
}
