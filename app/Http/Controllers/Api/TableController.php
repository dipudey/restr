<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TableCollection;
use App\Models\Table;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        return TableCollection::collection(Table::where('user_id',$user_id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $success = Table::insert([
            'user_id' => $request->user_id,
            'table_name' => $request->table_name,
            'created_at' => Carbon::now()
        ]);

        if($success) {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = Table::find($id)->update([
            'table_name' => $request->table_name
        ]);

        if($table) {
            return true;
        }
        else{
            return false;
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
        $table = Table::find($id)->delete();
        if($table) {
            return true;
        }
        else{
            return false;
        }
    }
}
