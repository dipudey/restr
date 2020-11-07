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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add New Food    
                        </button>
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
                                <th class="wd-10p border-bottom-0">Discount</th>
                                <th class="wd-10p border-bottom-0">Price</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($foods as $food)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a style="cursor: pointer" id="edit-table" data-id="{{ $food->id }}" class="btn btn-sm btn-success text-white"><i class="typcn typcn-edit"></i></a>
                                            <a href="{{ route('food.category.destroy',$food->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="typcn typcn-trash"></i></a>
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Food</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('food.store') }}" method="POST">
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