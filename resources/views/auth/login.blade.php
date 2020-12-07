<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from affixtheme.com/html/xmee/demo/login-11.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Dec 2020 11:19:13 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Restro | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{!! asset('loginasset') !!}/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{!! asset('loginasset') !!}/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{!! asset('loginasset') !!}/font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{!! asset('loginasset') !!}/style.css">
</head>

<body>
   
    <section class="fxt-template-animation fxt-template-layout11">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-7 col-sm-12 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-header">
                            <a href="/" class="fxt-logo"><img src="/backend/img/brand/logo.png" style="height: 70px !important" alt="Logo"></a>                        
                            <p>Login into your pages account</p>
						</div>
						<div class="text-center">
						
							<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
								<li class="nav-item">
								  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Restaurant</a>
								</li>
								<li class="nav-item">
								  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Branch</a>
								</li>
							</ul>


							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

									<div class="fxt-form"> 
										<form action="{{ route('login') }}" method="POST">
											@csrf
											<div class="form-group"> 
												<div class="fxt-transformY-50 fxt-transition-delay-1">                                              
													<input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email" required="required">
												</div>
												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="form-group">  
												<div class="fxt-transformY-50 fxt-transition-delay-2">                                              
													<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********" required="required" autocomplete="current-password">
													<i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
												</div>
												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="form-group">
												<div class="fxt-transformY-50 fxt-transition-delay-3">  
													<div class="fxt-checkbox-area">
														<div class="checkbox">
															<input id="checkbox1" type="checkbox">
															<label for="checkbox1">Keep me logged in</label>
														</div>
														{{-- <a href="forgot-password-11.html" class="switcher-text">Forgot Password</a> --}}
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="fxt-transformY-50 fxt-transition-delay-4">  
													<button type="submit" class="fxt-btn-fill">Log in</button>
												</div>
											</div>
										</form>                
									</div> 

								</div>

								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

									<div class="fxt-form"> 
										<form action="{{ route('branch.login') }}" method="POST">
											@csrf
											<div class="form-group"> 
												<div class="fxt-transformY-50 fxt-transition-delay-1">                                              
													<input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email" required="required">
												</div>
												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="form-group">  
												<div class="fxt-transformY-50 fxt-transition-delay-2">                                              
													<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********" required="required" autocomplete="current-password">
													<i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
												</div>
												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="form-group">
												<div class="fxt-transformY-50 fxt-transition-delay-3">  
													<div class="fxt-checkbox-area">
														<div class="checkbox">
															<input id="checkbox1" type="checkbox">
															<label for="checkbox1">Keep me logged in</label>
														</div>
														{{-- <a href="forgot-password-11.html" class="switcher-text">Forgot Password</a> --}}
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="fxt-transformY-50 fxt-transition-delay-4">  
													<button type="submit" class="fxt-btn-fill">Log in</button>
												</div>
											</div>
										</form>                 
									</div> 

								</div>
							
							</div>
						
						</div>                            
                        
                        
                    </div>
                </div>                    
            </div>
        </div>
    </section>    
    <!-- jquery-->
    <script src="{!! asset('loginasset') !!}/js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="{!! asset('loginasset') !!}/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{!! asset('loginasset') !!}/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="{!! asset('loginasset') !!}/js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="{!! asset('loginasset') !!}/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="{!! asset('loginasset') !!}/js/main.js"></script>

</body>

</html>