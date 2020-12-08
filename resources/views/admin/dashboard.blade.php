@extends('layouts.dashboard_master')
@section('content')
<div class="breadcrumb-header justify-content-between"></div>

<div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">Total Restaurant</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 font-weight-bold mb-1 text-white"> {{ $total_restaurant->count() }} </h4>
                        </div>
                        <span class="float-right my-auto ml-auto">
                            <i class="fas fa-arrow-circle-up text-white"></i>
                            <span class="text-white op-7"> </span>
                        </span>
                    </div>
                </div>
            </div>
            <span id="compositeline" class="pt-1"><canvas width="253" height="30" style="display: inline-block; width: 253.5px; height: 30px; vertical-align: top;"></canvas></span>
        </div>
    </div>

    {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
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
    </div> --}}

  

</div>

@endsection