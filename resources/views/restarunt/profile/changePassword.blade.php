@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>

<div class="row row-sm">


    <div class="col-xl-8 m-auto">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> Change Password </h4>
                </div>
                                 
                <div class="my-5">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Old Password</label>
                            <input type="password" name="old_password" class="form-control" required>
                            @if (session('passwordError'))
                              <span class="text-danger">{{ session('passwordError') }}</span>
                            @endif
                            @error ('old_password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="password" class="form-control" required>
                            @error ('password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if (session('samePassword'))
                              <span class="text-danger">{{ session('samePassword') }}</span>
                            @endif
                        </div>
                
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                            @error ('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <button type="submit" class="btn btn-success">Change</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection