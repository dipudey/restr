@extends('layouts.branch_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Purchase Product Update</h4>
                </div>
            </div>
            <div class="card-body mt-4">
                <form action="{{ route('branch.purchase.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $purchase->id }}" name="id">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for=""> Purchase Date <span class="text-danger">*</span> </label>
                            <input type="date" value="{{ $purchase->purchase_date }}" name="purchase_date" class="form-control" required>
                        </div>
                       <div class="col-md-6">
                            <label for=""> Product <span class="text-danger">*</span></label>
                            <select name="product_id" id="" class="form-control" required>
                                <option value="">select</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id == $purchase->product_id?'selected':'' }}>{{ $product->product_name }} >>> {{ $product->product_attribute }}</option>
                                @endforeach
                            </select>
                        </div> 
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for=""> Supplier <span class="text-danger">*</span></label>
                            <select name="supplier_id" id="" class="form-control" required>
                                <option value="">select</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ $supplier->id == $purchase->supplier_id?'selected':'' }}>{{ $supplier->contact_person }} ({{ $supplier->contact_number }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for=""> Product Cost <span class="text-danger">*</span> </label>
                            <input type="number" value="{{ $purchase->product_cost }}" name="product_cost" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for=""> Other Cost </label>
                            <input type="number" value="{{ $purchase->other_cost }}" name="other_cost" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for=""> Product Quantity <span class="text-danger">*</span> </label>
                            <input type="number" value="{{ $purchase->product_quantity }}" name="product_quantity" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Note">Note <span class="text-danger">*</span></label>
                        <textarea name="note" rows="4" class="form-control">{{ $purchase->note }}</textarea>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success"> Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection