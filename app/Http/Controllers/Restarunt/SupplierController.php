<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Carbon\Carbon;
use Auth;

class SupplierController extends Controller
{
    public function index() {
        return view('restarunt.supplier.index',[
            'suppliers' => Supplier::where('user_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }


    public function store(Request $request) {
        Supplier::insert([
            'user_id' => Auth::id(),
            'company_name' => $request->company_name,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'note' => $request->note,
            'created_at' => Carbon::now()
        ]);
        
        return back()->with('message',"New Supplier Added Successfully");
    }

    public function edit($id) {
        return view('restarunt.supplier.edit',[
            'supplier' => Supplier::find($id),
            'suppliers' => Supplier::where('user_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }

    public function update(Request $request) {
        Supplier::find($request->id)->update([
            'company_name' => $request->company_name,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'note' => $request->note,
        ]);
        
        return redirect()->route('supplier')->with('message',"Supplier update Successfully");
    }


    public function destroy($id) {
        Supplier::find($id)->delete();
        return back()->with('message',"Supplier Deleted Successfully");
    } 
}
