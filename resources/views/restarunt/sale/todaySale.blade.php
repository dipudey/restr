@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Today Sale List </h4>
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
                            
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->reserved_holder }}</td>
                                    <td>{{ $reservation->reserved_holder_phone }}</td>
                                    <td>{{ $reservation->branch->name }}</td>
                                    <td>{{ $reservation->table->table_name }}</td>
                                    <td>{{ $reservation->reservation_date }}</td>
                                    <td>{{ $reservation->reservation_time }}</td>
                                    <td>{{ $reservation->hour }}</td>
                                    <td>
                                        <div class="btn-group">
                                            {{-- <a href="{{ route('reservation.edit',$reservation->id) }}" class="btn btn-sm btn-success text-white"><i class="typcn typcn-edit"></i></a>
                                            <a href="{{ route('reservation.destroy',$reservation->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a> --}}
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
