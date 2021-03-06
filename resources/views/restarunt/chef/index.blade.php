@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">All Chef List</h4>
                </div>
            </div>
            <div class="card-body mt-4">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Branch Name</th>
                                <th class="wd-15p border-bottom-0">Phone</th>
                                <th class="wd-15p border-bottom-0">Email</th>
                                <th class="wd-15p border-bottom-0">Address</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($chefs as $chef)
                                <tr>
                                    <td>{{ $chef->name }}</td>
                                    <td>{{ $chef->branch->name }}</td>
                                    <td>{{ $chef->phone }}</td>
                                    <td>{{ $chef->email }}</td>
                                    <td>{{ $chef->address }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('chef.edit',$chef->id) }}" class="btn btn-sm btn-success text-white"><i class="typcn typcn-edit"></i></a>
                                            <a href="{{ route('chef.destroy',$chef->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a>
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
