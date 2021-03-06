@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">All Food Category List</h4>
                    <i class="mdi text-gray">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add New Food Category    
                        </button>
                    </i>
                </div>
            </div>
            <div class="card-body mt-4">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL.No</th>
                                <th class="wd-10p border-bottom-0">Food Category Name</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a style="cursor: pointer" id="edit-table" data-id="{{ $category->id }}" class="btn btn-sm btn-success text-white"><i class="typcn typcn-edit"></i></a>
                                            <a href="{{ route('food.category.destroy',$category->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Food Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('food.category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Food Category Name</label>
                    <input type="text" class="form-control" name="category_name" required>
                </div>
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

{{-- eidt modal  --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Food Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-labClose">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('food.category.update') }}" method="POST">
                @csrf
                <input type="hidden" id="editId" name="id" value="">
                <div class="form-group">
                    <label for="">Food Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="" required>
                </div>
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('body').on('click','#edit-table',function() {
                let id = $(this).data('id')
                
                $.ajax({
                    url: '/restarunt/food-category/edit/'+id,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $("#editId").val(data.id)
                        $("#category_name").val(data.category_name)
                        $("#editModal").modal('show')
                    }
                })

            })
        })
    </script>
@endsection