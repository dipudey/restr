@extends('layouts.dashboard_master')
@section('content')

<div class="breadcrumb-header justify-content-between"></div>
    
<!-- row -->
<div class="row">
    @php
        $color = ['primary','warning','success','info','secondary','muted','dark','info'];
        $flag = 0;
    @endphp


    @foreach ($packages as $package)
        <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="panel price panel-color">
                <div class="panel-heading bg-info p-0 text-center">
                    <h3>Package - {{ $flag + 1 }}</h3>
                </div>
                <div class="panel-body text-center">
                    <p class="lead"><strong> {{ $package->amount }}৳ /</strong>  month</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><strong> Branch - </strong> {{ $package->branch }}</li>
                    <li class="list-group-item"><strong> Chef - </strong> {{ $package->chef }} </li>
                    <li class="list-group-item"><strong> Waiter - </strong> {{ $package->waiter }} </li>
                    <li class="list-group-item"><strong> Order - </strong> {{ $package->order }} </li>
                    @if ($package->amount == 0)
                        <li class="list-group-item text-danger"><strong> 1 Month </strong> Free Trial </li>
                    @endif
                </ul>
                <div class="panel-footer text-center">
                    <form action="{{ route('restaurant.create') }}">
                        <input type="hidden" name="package" value="{{ $package->id }}">
                        @if ($package->amount == 0)
                            <button class="btn btn-warning">Trial!</button>
                        @else 
                            <button class="btn btn-info">Buy Now!</button>
                        @endif
                    </form>
                </div>
            </div>
        </div><!-- COL-END -->
        @php
            $flag++;
        @endphp
    @endforeach


</div>
<!-- /row -->


@endsection