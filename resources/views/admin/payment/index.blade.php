@extends('layouts.dashboard_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Payment List </h4>
                </div>
            </div>
            <div class="card-body mt-4">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Payment Date</th>
                                <th class="wd-15p border-bottom-0">Restaurant Name</th>
                                <th class="wd-15p border-bottom-0">Payment To</th>
                                <th class="wd-15p border-bottom-0">Payment Type</th>
                                <th class="wd-15p border-bottom-0">Transation</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->created_at->format("d-M-Y") }}</td>
                                    <td>{{ $payment->user->restaurant_name }}</td>
                                    <td>{{ $payment->payment_to }}</td>
                                    <td>{{ $payment->payment_type }}</td>
                                    <td>{{ $payment->transation }}</td>
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
