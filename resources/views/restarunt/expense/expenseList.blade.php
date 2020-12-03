@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All Expense</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add New Expense</a>
        </li>
    </ul>
</div>



<div class="row row-sm">
    <div class="col-md-12">

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">All Expense</h4>
                            <i class="mdi text-gray">
                            </i>
                        </div>
                    </div>
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
                                        <th class="wd-10p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($expenseList as $expense)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $expense->expenseType->expense_name }}</td>
                                            <td>{{ $expense->branch->name }}</td>
                                            <td>{{ $expense->amount }}</td>
                                            <td>{{ $expense->note }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('expense.edit',$expense->id) }}" class="btn btn-sm btn-success text-white"><i class="typcn typcn-edit"></i></a>
                                                    <a href="{{ route('expense.destroy',$expense->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Create New Expense Type</h4>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        <form action="{{ route('expense.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for=""> Expense Date <span class="text-danger">*</span> </label>
                                    <input type="date" name="expense_date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Branch</label>
                                    <select name="branch_id" class="form-control" id="">
                                        <option value="">select</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Expense Type <span class="text-danger">*</span></label>
                                    <select name="expnese_type_id" class="form-control" id="" required>
                                        <option value="">select</option>
                                        @foreach ($expnese_types as $expnese_type)
                                            <option value="{{ $expnese_type->id }}">{{ $expnese_type->expense_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for=""> Amoutn <span class="text-danger">*</span> </label>
                                    <input type="text" name="amount" class="form-control" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="">Note</label>
                                <textarea name="note" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
          </div>

    </div>
    
</div>


@endsection
