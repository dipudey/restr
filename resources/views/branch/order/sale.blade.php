@extends('layouts.branch_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Sale List </h4>
                </div>
            </div>
            <div class="card-body mt-4">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Order Id</th>
                                <th class="wd-15p border-bottom-0">Branch Name</th>
                                <th class="wd-15p border-bottom-0">Waitet Name</th>
                                <th class="wd-15p border-bottom-0">Table</th>
                                <th class="wd-15p border-bottom-0">Total Amount</th>
                                <th class="wd-15p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>restro{{ $sale->id }}</td>
                                    <td>{{ $sale->branch->name }}</td>
                                    <td>{{ isset($sale->waiter->name)?$sale->waiter->name:'Pos Sale' }}</td>
                                    <td>{{ isset($sale->table->table_name)?$sale->table->table_name:'Pos Sale' }}</td>
                                    <td>{{ $sale->orderFoods->sum('total_price') }}</td>
                                    <td>
                                        <a href="{{ route('branch.sale.invoice',$sale->id) }}" target="_blank" class="btn btn-primary btn-sm">Invoice</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
