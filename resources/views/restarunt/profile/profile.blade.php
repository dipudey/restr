@extends('layouts.restaurant_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>


<div class="row row-sm">
    <!-- Col -->
    <div class="col-lg-4">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="pl-0">
                    <div class="main-profile-overview">
                        <div class="main-img-user profile-user">
                            <img alt="" src="/backend/img/faces/6.jpg">
                        </div>
                        <div class="d-flex justify-content-between mg-b-20">
                            <div>
                                <h5 class="main-profile-name">{{ $data->restaurant_name }}</h5>
                            </div>
                        </div>
                        <h6></h6>
                        <div class="main-profile-bio mb-5"></div><!-- main-profile-bio -->
                       
                        <div class="row">
                            <div class="col-md-4 col mb20">
                                <h5> {{ $data->totalBranch->count() }} </h5>
                                <h6 class="text-small text-muted mb-0">Total Branch</h6>
                            </div>
                            <div class="col-md-4 col mb20">
                                <h5>{{ $data->foodItem->count() }}</h5>
                                <h6 class="text-small text-muted mb-0">Total Food Item</h6>
                            </div>
                            <div class="col-md-4 col mb20">
                                <h5>{{ $data->totalWaiter->count() }}</h5>
                                <h6 class="text-small text-muted mb-0">Total Waiter</h6>
                            </div>
                        </div>
                        <hr class="mg-y-30">
                        <label class="main-content-label tx-13 mg-b-20">Social</label>
                        <div class="main-profile-social-list">

                            <div class="media">
                                <div class="media-icon bg-info-transparent text-info">
                                    <i class="icon ion-logo-facebook"></i>
                                </div>
                                <div class="media-body">
                                    <span>Facebook</span> <a href="{{ $data->facebook_page }}">{{ $data->facebook_page }}</a>
                                </div>
                            </div>
                            @if ($data->website_link)
                                <div class="media">
                                    <div class="media-icon bg-danger-transparent text-danger">
                                        <i class="icon ion-md-link"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Website</span> <a href="{{ $data->website_link }}">{{ $data->website_link }}</a>
                                    </div>
                                </div>
                            @endif
                            
                        </div>
                        {{-- <hr class="mg-y-30"> --}}
                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label tx-13 mg-b-25">
                    Conatct
                </div>
                <div class="main-profile-contact-list">
                    <div class="media">
                        <div class="media-icon bg-primary-transparent text-primary">
                            <i class="icon ion-md-phone-portrait"></i>
                        </div>
                        <div class="media-body">
                            <span>Mobile</span>
                            <div>
                                {{ $data->phone }}
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-success-transparent text-success">
                            <i class="icon ion-logo-slack"></i>
                        </div>
                        <div class="media-body">
                            <span>City</span>
                            <div>
                                {{ $data->city }}
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-icon bg-info-transparent text-info">
                            <i class="icon ion-md-locate"></i>
                        </div>
                        <div class="media-body">
                            <span>Current Address</span>
                            <div>
                                {{ $data->address }}
                            </div>
                        </div>
                    </div>
                </div><!-- main-profile-contact-list -->
            </div>
        </div>
    </div>

    <!-- Col -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 main-content-label">Personal Information</div>
                <form class="form-horizontal" action="{{ route('restarunt.profile.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="mb-4 main-content-label">Name</div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Restarunt Name</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="restaurant_name"  placeholder="User Name" value="{{ $data->restaurant_name }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Owner Name</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="owner_name"  placeholder="User Name" value="{{ $data->owner_name }}">
                            </div>
                        </div>
                    </div> 
                    
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">User Name</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="user_name"  placeholder="User Name" value="{{ $data->user_name }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Email Address</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email"  placeholder="First Name" value="{{ $data->email }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Phone</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="phone"  placeholder="Last Name" value="{{ $data->phone }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 main-content-label">Contact Info</div>
                  
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Website</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="website_link" class="form-control"  placeholder="Website" value="{{ $data->website_link }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Facebook Page</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="facebook_page" class="form-control"  placeholder="Website" value="{{ $data->facebook_page }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label"> City </label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="city" class="form-control"  placeholder="Website" value="{{ $data->city }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Zip</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="zip" class="form-control"  placeholder="Website" value="{{ $data->zip }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Address</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address" rows="2"  placeholder="Address">{{ $data->address }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    <!-- /Col -->
</div>
<!-- row closed -->

@endsection
