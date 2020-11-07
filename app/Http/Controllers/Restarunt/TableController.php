<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use Carbon\Carbon;
use Auth;

class TableController extends Controller
{
    public function index() {
        return view('restarunt.table.index',[
            'tables' => Table::where('user_id',Auth::id())->orderBy('id','desc')->get() 
        ]);
    }

    public function store(Request $request) {
        Table::insert([
            'user_id' => Auth::id(),
            'table_name' => $request->table_name,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message',"New Table Added Successfully");
    }

    public function edit($id) {
        return response()->json(Table::find($id));
    }

    public function update(Request $request) {
        Table::find($request->id)->update([
            'table_name' => $request->table_name,
        ]);

        return back()->with('message',"Table Name updated");
    }

    public function destroy($id) {
        Table::find($id)->delete();
        return back()->with('message',"Table Deleted Successfully");
    }
}
