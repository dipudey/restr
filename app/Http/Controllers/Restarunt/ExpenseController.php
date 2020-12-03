<?php

namespace App\Http\Controllers\Restarunt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseType;
use App\Models\Expense;
use App\Models\Branch;
use Carbon\Carbon;
use Auth;

class ExpenseController extends Controller
{
    public function index() {
        return view('restarunt.expense.expenseType',[
            'expenseTypes' => ExpenseType::where('user_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }

    public function store(Request $request) {
        ExpenseType::insert([
            'user_id' => Auth::id(),
            'expense_name' => $request->expense_name,
            'created_at' => Carbon::now()
        ]);
        
        return back()->with('message',"New Expense Type Added Successfully");
    }

    public function edit($id) {
        return view('restarunt.expense.editExpense',[
            'expense_type' => ExpenseType::find($id),
            'expenseTypes' => ExpenseType::where('user_id',Auth::id())->orderBy('id','desc')->get()
        ]);
    }

    public function update(Request $request) {
        ExpenseType::find($request->id)->update([
            'expense_name' => $request->expense_name,
        ]);
        return redirect()->route('expense.type')->with('message',"Expense Type update Successfully");
    }

    public function destroy($id) {
        ExpenseType::find($id)->delete();
        return back()->with('message',"Expense Type Deleted Successfully");
    } 


    public function expenseList() {
        return view('restarunt.expense.expenseList',[
            'expenseList' => Expense::where('user_id',Auth::id())->orderBy('id','desc')->get(),
            'branches' => Branch::where('user_id',Auth::id())->get(),
            'expnese_types' => ExpenseType::where('user_id',Auth::id())->get()
        ]);
    }

    public function expenseStore(Request $request) {
        // dd($request->all());
        Expense::insert([
            'user_id' => Auth::id(),
            'branch_id' => $request->branch_id,
            'expense_type_id' => $request->expnese_type_id,
            'amount' => $request->amount,
            'note' => $request->note,
            'expense_date' => $request->expense_date,
            'created_at' => Carbon::now()
        ]); 

        return back()->with("message","New Expense Added Successfully");
    }

    public function expenseEdit($id) {
        return view('restarunt.expense.expenseEdit',[
            'expense' => Expense::find($id),
            'branches' => Branch::where('user_id',Auth::id())->get(),
            'expnese_types' => ExpenseType::where('user_id',Auth::id())->get(),
            'expenseList' => Expense::where('user_id',Auth::id())->orderBy('id','desc')->get(),
        ]);
    }

    public function expenseUpdate(Request $request) {
        Expense::find($request->id)->update([
            'branch_id' => $request->branch_id,
            'expense_type_id' => $request->expnese_type_id,
            'amount' => $request->amount,
            'note' => $request->note,
            'expense_date' => $request->expense_date,
        ]); 

        return redirect()->route('expense')->with("message","Expense Information Updated Successfully");
    }

    public function expenseDelete($id) {
        Expense::find($id)->delete();
        return back()->with('message',"Expense Infomation Deleted Successfully");
    }
}
