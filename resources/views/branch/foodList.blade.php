@extends('layouts.branch_master')
@section('content')

<div class="breadcrumb-header justify-content-between"></div>

<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">All Food List</h4>
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
                                <th class="wd-10p border-bottom-0">Add</th>
                                <th class="wd-10p border-bottom-0">Status</th>
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
                                    <td>
                                        <input type="checkbox" style="height: 25px" class="form-control" data-id="{{ $food->id }}" id="foodAddBranch" @isset($food->branchFood->food_id) checked @endisset>
                                    </td>
                                    <td>
                                        <input type="checkbox" style="height: 25px" class="form-control" data-id="{{ $food->id }}" id="foodStatus" @isset($food->branchFood->status) {{ $food->branchFood->status == 1 ? 'checked':'' }} @endisset>
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
@section('script')
    <script>
        $(document).ready(function(){ 
               
            $("body").on('change',"#foodAddBranch",function() {
                var token = document.getElementsByName("csrfToken").value;
                var token1 = document.getElementsByName("csrfToken").value;
                let id = $(this).data('id')
                $.ajax({
                    url: '/branch/food/add',
                    method: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        food_id: id,
                    },
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data) {
                        toastr.success(data)
                    }
                })
            })
            
            $("body").on('change',"#foodStatus",function() {
                let id = $(this).data('id')
                $.ajax({
                    url: '/branch/food/status',
                    method: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        food_id: id,
                    },
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data) {
                        if(data.error) {
                            toastr.error(data.error)
                        }
                        else{
                            toastr.success(data)
                        }
                    }
                })
            })
        })
    </script>
@endsection