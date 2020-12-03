@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Stock </h4>
                </div>
            </div>
            <div class="card-body mt-4">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Product Name</th>
                                <th class="wd-15p border-bottom-0">Buying Price</th>
                                <th class="wd-15p border-bottom-0">Selling Price</th>
                                <th class="wd-15p border-bottom-0">Available Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->buying_price }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>
                                        {{ $product->purchaseProduct->sum('product_quantity') }} &nbsp;{{ $product->product_attribute }}
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
