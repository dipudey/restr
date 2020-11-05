@extends('layouts.dashboard_master')

@section('content')

<div class="breadcrumb-header justify-content-between"></div>

<div class="row row-sm">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">Restaurant Resgistration</h4>
            </div>
            <div class="card-body pt-0 mt-4">
                <form class="" action="{{ route('restaurant.registration') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="restaurant_name">Restaurant Name <span class="text-danger">*</span></label>
                            <input type="text" id="restaurant_name" class="form-control" name="restaurant_name" required>
                            @error('restaurant_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="user_name">User Name <span class="text-danger">*</span></label>
                            <input type="text" id="user_name" class="form-control" name="user_name" required>
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="email"> Email Address <span class="text-danger">*</span></label>
                            <input type="text" id="email" class="form-control" name="email" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="owner_name">Restaurant Owner Name <span class="text-danger">*</span></label>
                            <input type="text" id="owner_name" class="form-control" name="owner_name" required>
                            @error('owner_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input type="text" id="address" class="form-control" name="address" required>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="branch_number"> Branch Number </label>
                            <input type="number" id="branch_number" class="form-control" name="branch_number">
                            @error('branch_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="website_link"> Website Link </label>
                            <input type="text" id="website_link" class="form-control" name="website_link">
                            @error('website_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="facebook_page"> Facebook Page</label>
                            <input type="text" id="facebook_page" class="form-control" name="facebook_page">
                            @error('facebook_page')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="country"> Country Name <span class="text-danger">*</span></label>
                            <input type="text" id="country" class="form-control" name="country" required>
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="city"> City <span class="text-danger">*</span></label>
                            <input type="text" id="city" class="form-control" name="city" required>
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="zip"> Zip <span class="text-danger">*</span></label>
                            <input type="text" id="zip" class="form-control" name="zip" required>
                            @error('zip')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="employee_number"> Employee Nmuber <span class="text-danger">*</span></label>
                            <input type="number" id="employee_number" class="form-control" name="employee_number" required>
                            @error('employee_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="waiter_number"> Waiter Name <span class="text-danger">*</span></label>
                            <input type="number" id="waiter_number" class="form-control" name="waiter_number" required>
                            @error('waiter_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="phone"> Contact Number <span class="text-danger">*</span></label>
                            <input type="text" id="phone" class="form-control" name="phone" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="password"> Password <span class="text-danger">*</span></label>
                            <input type="password" id="password" class="form-control" name="password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary mt-3" type="submit">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection