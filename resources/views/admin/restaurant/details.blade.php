@extends('layouts.dashboard_master')

@section('content')
<div class="breadcrumb-header justify-content-between"></div>

<!-- row -->
<div class="row row-sm">
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
                                <h5 class="main-profile-name">{{ $restaurant->restaurant_name }}</h5>
                            </div>
                        </div>
                        <h6>Expaier Date</h6>
                        <div class="main-profile-bio">
                            {{ $restaurant->expaier_date }}
                        </div><!-- main-profile-bio -->
                        
                        <div class="row">
                            <div class="col-md-4 col mb20">
                                <h5>{{ $restaurant->totalBranch->count() }}</h5>
                                <h6 class="text-small text-muted mb-0">Branch</h6>
                            </div>
                            <div class="col-md-4 col mb20">
                                <h5>{{ $restaurant->totalWaiter->count() }}</h5>
                                <h6 class="text-small text-muted mb-0">Waiter</h6>
                            </div>
                            <div class="col-md-4 col mb20">
                                <h5>{{ $restaurant->totalChef->count() }}</h5>
                                <h6 class="text-small text-muted mb-0">Chef</h6>
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
                                    <span>Facebook</span> <a href="{{ $restaurant->facebook_page }}">{{ $restaurant->facebook_page }}</a>
                                </div>
                            </div>
                            @if ($restaurant->website_link)
                                <div class="media">
                                    <div class="media-icon bg-danger-transparent text-danger">
                                        <i class="icon ion-md-link"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Website</span> <a href="{{ $restaurant->website_link }}">{{ $restaurant->website_link }}</a>
                                    </div>
                                </div>
                            @endif
                            
                        </div>
                        <hr class="mg-y-30">
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
                                                {{ $restaurant->phone }}
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
                                                {{ $restaurant->city }}
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
                                                {{ $restaurant->address }}
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- main-profile-contact-list -->
                            
                        <!--skill bar-->
                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        {{-- <div class="row row-sm">
            <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon bg-primary-transparent">
                                <i class="icon-layers text-primary"></i>
                            </div>
                            <div class="ml-auto">
                                <h5 class="tx-13">Orders</h5>
                                <h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
                                <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon bg-danger-transparent">
                                <i class="icon-paypal text-danger"></i>
                            </div>
                            <div class="ml-auto">
                                <h5 class="tx-13">Revenue</h5>
                                <h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
                                <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="counter-status d-flex md-mb-0">
                            <div class="counter-icon bg-success-transparent">
                                <i class="icon-rocket text-success"></i>
                            </div>
                            <div class="ml-auto">
                                <h5 class="tx-13">Product sold</h5>
                                <h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
                                <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card">
            <div class="card-body">
                <div class="tabs-menu ">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                        <li class="active">
                            <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">Food List</span> </a>
                        </li>
                        <li class="">
                            <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs"> Payment Details </span> </a>
                        </li>
                        {{-- <li class="">
                            <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">SETTINGS</span> </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                    <div class="tab-pane active" id="home">
                        <div class="row">
                            @foreach ($restaurant->foodItem as $food)
                                <div class="col-sm-4">
                                    <div class=" border p-1 card thumb">
                                        <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{ asset('uploads/'.$food->picture) }}" style="height: 150px !important;" class="thumb-img" alt="work-thumbnail"> </a>
                                        <h4 class="text-center tx-14 mt-3 mb-0">{{ $food->food_name }}</h4>
                                        <div class="ga-border"></div>
                                        {{-- <p class="text-muted text-center"><small>Photography</small></p> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane" id="profile">
                        <div class="table-responsive country-table">
                            <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-lg-25p">Payment Date</th>
                                        <th class="wd-lg-25p tx-right">Payment Type</th>
                                        <th class="wd-lg-25p tx-right">Payment To</th>
                                        <th class="wd-lg-25p tx-right"> Transation </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($restaurant->payment as $item)
                                        <tr>
                                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{ $item->payment_type }}</td>
                                            <td class="tx-right tx-medium tx-inverse">{{ $item->payment_to }}</td>
                                            <td class="tx-right tx-medium tx-danger">{{ $item->transation }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings">
                        <form role="form">
                            <div class="form-group">
                                <label for="FullName">Full Name</label>
                                <input type="text" value="John Doe" id="FullName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" value="first.last@example.com" id="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" value="john" id="Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="RePassword">Re-Password</label>
                                <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="AboutMe">About Me</label>
                                <textarea id="AboutMe" class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>
                            </div>
                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->



@endsection