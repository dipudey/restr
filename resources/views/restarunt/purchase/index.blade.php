@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Purchase Product</h4>
                </div>
            </div>
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
                                <th class="wd-10p border-bottom-0">Action</th>
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
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('purchase.edit',$purchase->id) }}" class="btn btn-sm btn-success text-white"><i class="typcn typcn-edit"></i></a>
                                            <a href="{{ route('purchase.destroy',$purchase->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a>
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

</div>


@endsection
