@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">All Food List</h4>
                    <i class="mdi text-gray">
                        <a href="{{ route('food.create') }}" class="btn btn-primary">
                            Add New Food    
                        </a>
                    </i>
                </div>
            </div>
            <div class="card-body mt-4">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">Food Name</th>
                                <th class="wd-10p border-bottom-0">Picture</th>
                                <th class="wd-10p border-bottom-0">Food Category Name</th>
                                <th class="wd-10p border-bottom-0">Price</th>
                                <th class="wd-10p border-bottom-0">Discount Price</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($foods as $food)
                                <tr>
                                    <td>{{ $food->food_name }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$food->picture) }}" height="50" alt="">
                                    </td>
                                    <td>{{ $food->category->category_name }}</td>
                                    <td>{{ $food->price }}</td>
                                    <td>{{ $food->discount_price }}</td>
                                    {{-- <td>{{ $food->discount }}</td>
                                    <td>
                                        @if ($food->status == 0)
                                            <div class="badge badge-danger">Unavailable</div>
                                        @else
                                            <div class="badge badge-success">Available</div>
                                        @endif
                                    </td> --}}
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('food.edit',$food->id) }}" class="btn btn-sm btn-success text-white"><i class="typcn typcn-edit"></i></a>
                                            <a href="{{ route('food.destroy',$food->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a>
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
