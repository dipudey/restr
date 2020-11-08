@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-8 m-auto">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Create New Food</h4>
                </div>
            </div>
            <div class="card-body mt-4">
                <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Food Name <span class="text-danger">*</span> </label>
                        <input type="text" name="food_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Food Category Name <span class="text-danger">*</span></label>
                        <select name="food_category_id" class="form-control" required>
                            <option value="">select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Price<span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="number" name="discount" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Food Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" required>
                            <option value="1">Available</option>
                            <option value="0">Unavailable</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Picture <span class="text-danger">*</span></label>
                        <input type="file" name="picture" class="form-control" required>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection