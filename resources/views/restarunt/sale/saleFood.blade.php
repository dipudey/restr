@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm row-deck">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card card-table-two">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-1">Today Sale Food</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <span class="tx-12 tx-muted mb-3 "></span>
            <div class="table-responsive country-table">
                <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap " id="example1">
                    <thead>
                        <tr>
                            <th class="wd-lg-25p">Food Name</th>
                            <th class="wd-lg-25p">Picture</th>
                            <th class="wd-lg-25p">Food Category</th>
                            <th class="wd-lg-25p">Sale</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($foods as $food)
                            <tr>
                                <td class="tx-medium tx-inverse">{{ $food->food_name }}</td>
                                <td class="tx-medium tx-inverse">
                                    <img src="{{ asset('uploads/'.$food->picture) }}" height="50" alt="">
                                </td>
                                <td class="tx-medium tx-inverse">{{ $food->category->category_name }}</td>
                                <td class="tx-medium tx-inverse">{{ $food->orderFood->count() }}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
    