@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Expense Report </h4>
                </div>
                <form action="">
                    <div class="row my-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <label for="">Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-5">
                            <label for="">To Date</label>
                            <input type="date" name="end_date" class="form-control">
                        </div> 
                    </div>
                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>                   
                
            </div>


            @isset($expenseList)
                <div class="card-body mt-4">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">SL NO</th>
                                    <th class="wd-10p border-bottom-0">Expense Type</th>
                                    <th class="wd-10p border-bottom-0">Branch</th>
                                    <th class="wd-10p border-bottom-0">Expense Amount</th>
                                    <th class="wd-10p border-bottom-0">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($expenseList as $expense)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $expense->expenseType->expense_name }}</td>
                                            <td>{{ $expense->branch->name }}</td>
                                            <td>{{ $expense->amount }}</td>
                                            <td>{{ $expense->note }}</td>=
                                        </tr>
                                @endforeach
                                
                            </tbody>
                            {{-- <div class="text-center">

                            </div> --}}
                        </table>
                        
                    </div>
                </div>
            @endisset


            
        </div>
    </div>

</div>


@endsection
