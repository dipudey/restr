@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">  Purchases Report </h4>
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


            @isset($purchases)
                <div class="card-body mt-4">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Purchase Date</th>
                                    <th class="wd-15p border-bottom-0">Product Name</th>
                                    <th class="wd-15p border-bottom-0">Branch Name</th>
                                    <th class="wd-15p border-bottom-0">Supplier Name</th>
                                    <th class="wd-15p border-bottom-0">Total Cost</th>
                                    <th class="wd-15p border-bottom-0">Product Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->purchase_date }}</td>
                                        <td>{{ $purchase->product->product_name }}</td>
                                        <td>{{ $purchase->branch->name }}</td>
                                        <td>{{ $purchase->supplier->contact_person }}</td>
                                        <td>{{ $purchase->total_cost }}</td>
                                        <td>{{ $purchase->product_quantity }} {{ $purchase->product->product_attribute }}</td>
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
