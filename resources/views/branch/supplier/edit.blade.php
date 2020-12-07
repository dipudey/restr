@extends('layouts.branch_master')

@section('content')
<div class="breadcrumb-header justify-content-between">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab" aria-controls="pills-edit" aria-selected="true">Edit Supplier</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">All Supplier</a>
        </li>
    </ul>
</div>



<div class="row row-sm">
    <div class="col-md-12">

        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Edit Supplier</h4>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        <form action="{{ route('branch.supplier.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $supplier->id }}" name="id">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Company Name </label>
                                    <input type="text" value="{{ $supplier->company_name }}" name="company_name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Contact Person <span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ $supplier->contact_person }}" name="contact_person" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Contact Number <span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ $supplier->contact_number }}" name="contact_number" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address <span class="text-danger">*</span> </label>
                                    <input type="text" value="{{ $supplier->address }}" name="address" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Note</label>
                                <textarea name="note" id="" rows="4" class="form-control">{{ $supplier->note }}</textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">All Supplier List</h4>
                            <i class="mdi text-gray">
                            </i>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-10p border-bottom-0">Supplier Name</th>
                                        <th class="wd-10p border-bottom-0">Company Name</th>
                                        <th class="wd-10p border-bottom-0">Contact Number</th>
                                        <th class="wd-10p border-bottom-0">Address</th>
                                        <th class="wd-10p border-bottom-0">Note</th>
                                        <th class="wd-10p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $supplier->contact_person }}</td>
                                            <td>{{ $supplier->company_name }}</td>
                                            <td>{{ $supplier->contact_number }}</td>
                                            <td>{{ $supplier->address }}</td>
                                            <td>{{ $supplier->note }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('supplier.edit',$supplier->id) }}" class="btn btn-sm btn-success text-white"><i class="typcn typcn-edit"></i></a>
                                                    <a href="{{ route('supplier.destroy',$supplier->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a>
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

    </div>
    
</div>


@endsection
