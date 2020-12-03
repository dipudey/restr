<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Branch;
use App\Models\Table;
use Carbon\Carbon;
use Auth;

class ReservationController extends Controller
{
    public function index() {
        return view('restarunt.reservation.index',[
            'reservations' => Reservation::where('user_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }

    public function create() {
        return view('restarunt.reservation.create',[
            'branches' => Branch::where('user_id',Auth::id())->get(),
        ]);
    }


    public function store(Request $request) {
        Reservation::insert([
            'user_id' => Auth::id(),
            'branch_id' => $request->branch_id,
            'table_id' => $request->table_id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'hour' => $request->hour,
            'amount' => $request->amount,
            'reserved_holder' => $request->reserved_holder,
            'reserved_holder_phone' => $request->reserved_holder_phone,
            'reserved_holder_phone' => $request->reserved_holder_phone,
            'created_at' => Carbon::now()
        ]);
        
        return redirect()->route('reservation')->with('message',"Reservation Successfully");
    }

    public function edit($id) {
        $data = Reservation::find($id);
        return view('restarunt.reservation.edit',[
            'branches' => Branch::where('user_id',Auth::id())->get(),
            'reserve' => $data,
            'tables' => Table::where('branch_id',$data->branch_id)->get()
        ]);
    }

    public function update(Request $request) {
        Reservation::find($request->id)->update([
            'branch_id' => $request->branch_id,
            'table_id' => $request->table_id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'hour' => $request->hour,
            'amount' => $request->amount,
            'reserved_holder' => $request->reserved_holder,
            'reserved_holder_phone' => $request->reserved_holder_phone,
            'reserved_holder_phone' => $request->reserved_holder_phone,
        ]);
        
        return redirect()->route('reservation')->with('message',"Reservation Update Successfully");
    }


    public function destroy($id) {
        Reservation::find($id)->delete();
        return back()->with('message',"Reservation Deleted Successfully");
    }

    public function reservationTable($branch_id) {
        return response()->json(Table::where('branch_id',$branch_id)->get());
    }
}
