@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add New Product</a>
        </li>
    </ul>
</div>



<div class="row row-sm">
    <div class="col-md-12">

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">All Product List</h4>
                            <i class="mdi text-gray">
                            </i>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-10p border-bottom-0">Product Name</th>
                                        <th class="wd-10p border-bottom-0">Product Attribute</th>
                                        <th class="wd-10p border-bottom-0">Buying Price</th>
                                        <th class="wd-10p border-bottom-0">Selling Price</th>
                                        <th class="wd-10p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_attribute }}</td>
                                            <td>{{ $product->buying_price }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-success text-white"><i class="typcn typcn-edit"></i></a>
                                                    <a href="{{ route('product.destroy',$product->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a>
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


            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Create New Food</h4>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Product Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="product_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for=""> Product Type <span class="text-danger">*</span></label>
                                    <select name="productType" id="productType" class="form-control" required>
                                        <option value="0">select</option>
                                        <option value="1">Raw Meterials</option>
                                        <option value="2">Others</option>
                                    </select>
                                </div>
                            </div>


                            <div id="productFrom"></div>


                        </form>
                    </div>
                </div>
            </div>
            
          </div>

    </div>
    
</div>


@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("body").on('change',"#productType",function() {
                let type = $(this).val()
                let rawMeterials = `
                <div class="form-group row">
                        <div class="col-md-6">
                            <label for=""> Product Unit <span class="text-danger">*</span></label>
                            <select name="product_attribute" class="form-control" required>
                                <option value="">select</option>
                                <option value="kg">Kilograms (kg)</option>
                                <option value="piece">Piece</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="buyingPrice">
                                <label for="">Buying Price<span class="text-danger">*</span></label>
                                <input type="number" name="bying_price" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                `

                let others = `
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for=""> Product Unit <span class="text-danger">*</span></label>
                            <select name="product_attribute" class="form-control" required>
                                <option value="">select</option>
                                <option value="kg">Kilograms (kg)</option>
                                <option value="piece">Piece</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="buyingPrice">
                                <label for="">Buying Price<span class="text-danger">*</span></label>
                                <input type="number" name="bying_price" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="sellingPrice">
                        <label for="">Selling Price<span class="text-danger">*</span></label>
                        <input type="number" name="selling_price" class="form-control" required>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                `

                if(type == 0){
                    $("#productFrom").html('')
                }
                else if(type == 1){
                    $("#productFrom").html(rawMeterials)
                }
                else {
                    $("#productFrom").html(others)
                }
            })
        })
    </script>
@endsection