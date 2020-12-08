@extends('layouts.dashboard_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">All Restarunt List</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Restarunt Name</th>
                                <th class="wd-10p border-bottom-0">Phone</th>
                                <th class="wd-15p border-bottom-0">Address</th>
                                <th class="wd-20p border-bottom-0">Owner Name</th>
                                <th class="wd-15p border-bottom-0">Country</th>
                                <th class="wd-25p border-bottom-0">E-mail</th>
                                <th class="wd-25p border-bottom-0">Expaier Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurants as $restaurant)
                                <tr>
                                    <td>{{ $restaurant->restaurant_name }}</td>
                                    <td>{{ $restaurant->phone }}</td>
                                    <td>{{ $restaurant->address }}</td>
                                    <td>{{ $restaurant->owner_name }}</td>
                                    <td>{{ $restaurant->country }}</td>
                                    <td>{{ $restaurant->email }}</td>
                                    <td>{{ date('d-M-Y',strtotime($restaurant->expaier_date)) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('restaurant.details',$restaurant->id) }}" class="btn btn-sm btn-primary"><i class="far fa-eye"></i></a>
                                            <a href="{{ route('restaurant.edit',$restaurant->id) }}" class="btn btn-sm btn-success"><i class="typcn typcn-edit"></i></a>
                                            <a href="{{ route('restaurant.destroy',$restaurant->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a>
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