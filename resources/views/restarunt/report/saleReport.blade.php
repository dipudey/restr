@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">  Sale Report </h4>
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


            @isset($sales)
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
                                        <td>{{ $sale->waiter->name }}</td>
                                        <td>{{ $sale->table->table_name }}</td>
                                        <td>{{ $sale->orderFoods->sum('total_price') }}</td>
                                        <td>
                                            <a href="{{ route('sale.invoice',$sale->id) }}" target="_blank" class="btn btn-primary btn-sm">Invoice</a>
                                        </td>
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
