<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Expense;
use App\Models\Purchase;
use Auth;

class ReportController extends Controller
{
    public function saleReport(Request $request) {
        if($request->start_date) {
            $date = $request->start_date;
            $date_to_date = $request->end_date ? $request->end_date : $request->start_date;
            $sales = Order::whereBetween('order_date', [$date,$date_to_date])->where('user_id',Auth::id())->get();
            return view('restarunt.report.saleReport',[
                'sales' => $sales
            ]);
        }
        else{
            return view('restarunt.report.saleReport');
        }
    }

    public function expenseReport(Request $request) {
        if($request->start_date) {
            $date = $request->start_date;
            $date_to_date = $request->end_date ? $request->end_date : $request->start_date;
            $expenseList = Expense::whereBetween('expense_date', [$date,$date_to_date])->where('user_id',Auth::id())->get();
            return view('restarunt.report.expenseReport',[
                'expenseList' => $expenseList
            ]);
        }
        else{
            return view('restarunt.report.expenseReport');
        }
    }

    public function purchesReport(Request $request) {
        if($request->start_date) {
            $date = $request->start_date;
            $date_to_date = $request->end_date ? $request->end_date : $request->start_date;
            $purchases = Purchase::whereBetween('purchase_date', [$date,$date_to_date])->where('user_id',Auth::id())->get();
            return view('restarunt.report.purchesReport',[
                'purchases' => $purchases
            ]);
        }
        else{
            return view('restarunt.report.purchesReport');
        }
    }
}
