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
                <form action="{{ route('food.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $food->id }}" name="id">
                    <div class="form-group">
                        <label for="">Food Name <span class="text-danger">*</span> </label>
                        <input type="text" name="food_name" value="{{ $food->food_name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Food Category Name <span class="text-danger">*</span></label>
                        <select name="food_category_id" class="form-control" required>
                            <option value="">select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $food->food_category_id?'selected':'' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Price<span class="text-danger">*</span></label>
                        <input type="number" name="price" value="{{ $food->price }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Discoutn Type</label>
                        <select name="discount_type" id="" class="form-control">
                            <option value="1" {{ $food->discount_percentage?'selected':'' }}>Discount Percentage</option>
                            <option value="2" {{ $food->discount_amount?'selected':'' }}>Discount Amount</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Discount</label>
                        @if ($food->discount_percentage)
                            <input type="number" name="discount" value="{{ $food->discount_percentage }}" class="form-control" >
                        @else 
                            <input type="number" name="discount" value="{{ $food->discount_amount }}" class="form-control" >
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Old Picture</label>
                        <img src="{{ asset('uploads/'.$food->picture) }}" height="100" alt="">
                    </div>
                    <div class="form-group">
                        <label for="">Picture <span class="text-danger">*</span></label>
                        <input type="file" name="picture" class="form-control">
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