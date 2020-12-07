@extends('layouts.branch_master')

@section('content')

<div class="breadcrumb-header justify-content-between"></div>

<div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">TODAY ORDERS</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white"> </h4>
                        </div>
                        <span class="float-right my-auto ml-auto">
                            <i class="fas fa-arrow-circle-up text-white"></i>
                            <span class="text-white op-7"> +</span>
                        </span>
                    </div>
                </div>
            </div>
            <span id="compositeline" class="pt-1"><canvas width="253" height="30" style="display: inline-block; width: 253.5px; height: 30px; vertical-align: top;"></canvas></span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-danger-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">TODAY Expense</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white"></h4>
                        </div>
                        <span class="float-right my-auto ml-auto">
                            <i class="fas fa-arrow-circle-down text-white"></i>
                            <span class="text-white op-7"></span>
                        </span>
                    </div>
                </div>
            </div>
            <span id="compositeline2" class="pt-1"><canvas width="253" height="30" style="display: inline-block; width: 253.5px; height: 30px; vertical-align: top;"></canvas></span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-success-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">This Month EARNINGS</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white"></h4>
                        </div>
                        <span class="float-right my-auto ml-auto">
                            <i class="fas fa-arrow-circle-up text-white"></i>
                            <span class="text-white op-7"></span>
                        </span>
                    </div>
                </div>
            </div>
            <span id="compositeline3" class="pt-1"><canvas width="253" height="30" style="display: inline-block; width: 253.5px; height: 30px; vertical-align: top;"></canvas></span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-warning-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">This Month Expense</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white"></h4>
                        </div>
                        <span class="float-right my-auto ml-auto">
                            <i class="fas fa-arrow-circle-down text-white"></i>
                            <span class="text-white op-7"></span>
                        </span>
                    </div>
                </div>
            </div>
            <span id="compositeline4" class="pt-1"><canvas width="253" height="30" style="display: inline-block; width: 253.5px; height: 30px; vertical-align: top;"></canvas></span>
        </div>
    </div>
</div>

<div class="row row-sm row-deck">
    {{-- <div class="col-md-12 col-lg-4 col-xl-4">
        <div class="card card-dashboard-eight pb-2">
            <h6 class="card-title">Branch List</h6><span class="d-block mg-b-10 text-muted tx-12"></span>
            <div class="list-group">
                @foreach ($branches as $branch)
                    <div class="list-group-item border-top-0">
                        <p>{{ $branch->name }}</p><span>
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card card-table-two">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-1">Today Reservation</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <span class="tx-12 tx-muted mb-3 "></span>
            <div class="table-responsive country-table">
                <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                    <thead>
                        <tr>
                            <th class="wd-lg-25p">Time</th>
                            <th class="wd-lg-25p tx-right">Reserved Holder</th>
                            <th class="wd-lg-25p tx-right">Reserved Holder Phone</th>
                            <th class="wd-lg-25p tx-right">Branch</th>
                            <th class="wd-lg-25p tx-right">Table</th>
                            <th class="wd-lg-25p tx-right">Hour</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @foreach ($today_reservation as $reservation)
                            <tr>
                                <td>{{ date('h:i:sa', strtotime($reservation->reservation_time)) }}</td>
                                <td class="tx-right tx-medium tx-inverse">{{ $reservation->reserved_holder }}</td>
                                <td class="tx-right tx-medium tx-inverse">{{ $reservation->reserved_holder_phone }}</td>
                                <td class="tx-right tx-medium tx-danger">{{ $reservation->branch->name }}</td>
                                <td class="tx-right tx-medium tx-danger">{{ $reservation->table->table_name }}</td>
                                <td class="tx-right tx-medium tx-danger">{{ $reservation->hour }}</td>
                            </tr>
                        @endforeach --}}
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection