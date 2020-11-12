@include('layouts.backend.header')
<!-- Loader -->
<div id="global-loader">
    <img src="{!! asset('backend') !!}/img/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->
@include('layouts.backend.branch_sidebar')

<!-- main-content -->
<div class="main-content app-content">
    @include('layouts.backend.topbar')
    
    <!-- container -->
    <div class="container-fluid">
                      
        @yield('content')

    </div>
    <!-- /Container -->
</div>
<!-- /main-content -->


@include('layouts.backend.footer')