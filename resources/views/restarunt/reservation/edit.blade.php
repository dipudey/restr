@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Edit Reservation</h4>
                </div>
            </div>
            <div class="card-body mt-4">
                <form action="{{ route('reservation.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $reserve->id }}">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Branch <span class="text-danger">*</span></label>
                            <select name="branch_id" class="form-control" id="branch_id" required>
                                <option value="">select</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $branch->id == $reserve->branch_id?'selected':'' }}>{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for=""> Table <span class="text-danger">*</span></label>
                            <select name="table_id" class="form-control" id="table_id" required>
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }}" {{ $table->id == $reserve->table_id?'selected':'' }}>{{ $table->table_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Reservation Date<span class="text-danger">*</span></label>
                            <input type="date" name="reservation_date" value="{{ $reserve->reservation_date }}" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Reservation Time <span class="text-danger">*</span></label>
                            <input type="time" name="reservation_time" value="{{ $reserve->reservation_time }}" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Hour <span class="text-danger">*</span></label>
                            <input type="number" name="hour" value="{{ $reserve->hour }}" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""> Amount <span class="text-danger">*</span></label>
                            <input type="number" name="amount" value="{{ $reserve->amount }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Reserved Holder <span class="text-danger">*</span></label>
                            <input type="text" name="reserved_holder" value="{{ $reserve->reserved_holder }}" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Reserved Holder Phone <span class="text-danger">*</span></label>
                            <input type="text" name="reserved_holder_phone" value="{{ $reserve->reserved_holder_phone }}" class="form-control" required>
                        </div>
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
@section('script')
    <script>
        $(document).ready(function() {
            $('body').on("change","#branch_id",function() {
                let id = $(this).val()
                // alert(id)
                $.ajax({
                    url: '/restarunt/reservation/branch/table/'+id,
                    method: 'get',
                    dataType: 'json',
                    success: function (data) {
                        let table = `<option value="">select</option>`
                        data.forEach(element => {
                            table += `<option value="${element.id}">${element.table_name}</option>`
                        })
                        $("#table_id").html(table)
                    }
                })
            })
        })
    </script>
@endsection