@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-8 m-auto">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Branch Update</h4>
                </div>
            </div>
            <div class="card-body mt-4">
                <form action="{{ route('branch.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $branch->id }}">
                    <div class="form-group">
                        <label for="">Branch Name <span class="text-danger">*</span> </label>
                        <input type="text" name="name" value="{{ $branch->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="phone" value="{{ $branch->phone }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ $branch->email }}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" value="{{ $branch->address }}" class="form-control" >
                    </div> 

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection