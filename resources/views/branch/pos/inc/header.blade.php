
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from laravel.spruko.com/valex/horizontal-light-ltr/products by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2020 09:07:44 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

<meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="Description" content="">
<meta name="Author" content="">
<meta name="Keywords" content=""/>
		<!-- Title -->
<title>Dashboard</title>
<!-- Favicon -->
<link rel="icon" href="{!! asset('backend/pos') !!}/img/brand/favicon.png" type="image/x-icon"/>
<!-- Icons css -->
<link href="{!! asset('backend/pos') !!}/css/icons.css" rel="stylesheet">
<!--  Right-sidemenu css -->
<link href="{!! asset('backend/pos') !!}/plugins/sidebar/sidebar.css" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{!! asset('backend/pos') !!}/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>
<!--- Style css-->
<link href="{!! asset('backend/pos') !!}/css/style.css" rel="stylesheet">
<link href="{!! asset('backend/pos') !!}/css/style-dark.css" rel="stylesheet">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">


<!-- Internal Nice-select css  -->
<link href="{!! asset('backend/pos') !!}/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet"/>
<!---Skinmodes css-->
<link href="{!! asset('backend/pos') !!}/css/skin-modes.css" rel="stylesheet" />
<!--- Animations css-->
<link href="{!! asset('backend/pos') !!}/css/animate.css" rel="stylesheet">
<!---Switcher css-->
<link href="{!! asset('backend/pos') !!}/switcher/css/switcher.css" rel="stylesheet">
<link href="{!! asset('backend/pos') !!}/switcher/demo.css" rel="stylesheet">	

<!-- Footer closed -->				<!-- JQuery min js -->
<script src="{!! asset('backend/pos') !!}/plugins/jquery/jquery.min.js"></script>

</head>

	<body class="main-body">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{!! asset('backend/pos') !!}/img/loader.svg" class="loader-img" alt="Loader">
		</div>
        <!-- /Loader -->
        
		<!-- main-header opened -->
		<div class="main-header nav nav-item hor-header">
			<div class="container">
				<div class="main-header-left ">
					<a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a><!-- sidebar-toggle-->
					<a class="header-brand" href="index.html">
						<img src="{!! asset('backend/pos') !!}/img/brand/logo-white.png" class="desktop-dark">
						<img src="{!! asset('backend/pos') !!}/img/brand/logo.png" class="desktop-logo">
						<img src="{!! asset('backend/pos') !!}/img/brand/favicon.png" class="desktop-logo-1">
						<img src="{!! asset('backend/pos') !!}/img/brand/favicon-white.png" class="desktop-logo-dark">
					</a>
				</div><!-- search -->
				<div class="main-header-right">

					<div class="nav nav-item  navbar-nav-right ml-auto">
						<div class="dropdown main-profile-menu nav nav-item nav-link">
                            <a class="profile-user d-flex" href="#"><img alt="" src="{!! asset('backend') !!}/img/faces/6.jpg"></a>
                            <div class="dropdown-menu">
                                <div class="main-header-profile bg-primary p-3">
                                    <div class="d-flex wd-100p">
                                        <div class="main-img-user"><img alt="" src="{!! asset('backend') !!}/img/faces/6.jpg" class=""></div>
                                        <div class="ml-3 my-auto">
                                            <h6>{{ Auth::user()->name ? Auth::user()->name : Auth::user()->restaurant_name  }}</h6>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::user()->user_category == "restarunt")
                                    <a class="dropdown-item" href="{{ route('restarunt.profile') }}"><i class="bx bx-user-circle"></i>Profile</a>
                                @elseif(Auth::user()->user_category == "branch")
                                    <a class="dropdown-item" href="{{ route('branch.profile') }}"><i class="bx bx-user-circle"></i>Profile</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user-circle"></i>Profile</a>
                                @endif
                                
                                <a class="dropdown-item" href="{{ route('change.password') }}"><i class="bx bx-slider-alt"></i> Change Password</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" ><i class="bx bx-log-out"></i> Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
				</div>
			</div>
		</div>
        <!-- /main-header -->
		<!--Horizontal-main -->
		<div class="sticky">
			<div class="horizontal-main hor-menu clearfix side-header">
				<div class="horizontal-mainwrapper container clearfix">
					<!--Nav-->
					<nav class="horizontalMenu clearfix">
						<ul class="horizontalMenu-list">
							<li aria-haspopup="true"><a href="/branch/home" class=""><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg>Dashboard</a></li>
						</ul>
					</nav>
					<!--Nav-->
				</div>
			</div>
        </div>
        


        <!--Horizontal-main -->
		<!-- main-content opened -->
		<div class="main-content horizontal-content">
			<!-- container opened -->
			{{-- <div class="container-fluid" id="app"> --}}
			<div class="container" id="app">
				<!-- breadcrumb -->
				{{-- <div class="breadcrumb-header justify-content-between"></div> --}}
				<!-- breadcrumb -->
				<div class="my-3"></div>