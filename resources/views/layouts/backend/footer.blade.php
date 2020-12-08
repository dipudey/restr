    <!-- Footer opened -->
    <div class="main-footer ht-40">
        <div class="container-fluid pd-t-0-f ht-100p">
            <span>Copyright © {{ date("Y") }} </span>
        </div>
    </div>
    <!-- Footer closed -->				<!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
    <!-- JQuery min js -->
    <script src="{!! asset('backend') !!}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Bundle js -->
    <script src="{!! asset('backend') !!}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Ionicons js -->
    <script src="{!! asset('backend') !!}/plugins/ionicons/ionicons.js"></script>
    <!-- Moment js -->
    <script src="{!! asset('backend') !!}/plugins/moment/moment.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- Rating js-->
    <script src="{!! asset('backend') !!}/plugins/rating/jquery.rating-stars.js"></script>
    <script src="{!! asset('backend') !!}/plugins/rating/jquery.barrating.js"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{!! asset('backend') !!}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/perfect-scrollbar/p-scroll.js"></script>
    <!--Internal Sparkline js -->
    <script src="{!! asset('backend') !!}/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Scroll bar Js-->
    <script src="{!! asset('backend') !!}/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- right-sidebar js -->
    <script src="{!! asset('backend') !!}/plugins/sidebar/sidebar.js"></script>
    <script src="{!! asset('backend') !!}/plugins/sidebar/sidebar-custom.js"></script>
    <!-- Eva-icons js -->
    <script src="{!! asset('backend') !!}/js/eva-icons.min.js"></script>
    <!--Internal  Chart.bundle js -->
    <script src="{!! asset('backend') !!}/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Moment js -->
    <script src="{!! asset('backend') !!}/plugins/raphael/raphael.min.js"></script>
    <!--Internal  Flot js-->
    <script src="{!! asset('backend') !!}/plugins/jquery.flot/jquery.flot.js"></script>
    <script src="{!! asset('backend') !!}/plugins/jquery.flot/jquery.flot.pie.js"></script>
    <script src="{!! asset('backend') !!}/plugins/jquery.flot/jquery.flot.resize.js"></script>
    <script src="{!! asset('backend') !!}/plugins/jquery.flot/jquery.flot.categories.js"></script>
    <script src="{!! asset('backend') !!}/js/dashboard.sampledata.js"></script>
    <script src="{!! asset('backend') !!}/js/chart.flot.sampledata.js"></script>
    <!--Internal Apexchart js-->
    <script src="{!! asset('backend') !!}/js/apexcharts.js"></script>
    <!-- Internal Map -->
    <script src="{!! asset('backend') !!}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="{!! asset('backend') !!}/js/modal-popup.js"></script>
    <!--Internal  index js -->
    <script src="{!! asset('backend') !!}/js/index.js"></script>
    <script src="{!! asset('backend') !!}/js/jquery.vmap.sampledata.js"></script>	
    <!-- Sticky js -->
    <script src="{!! asset('backend') !!}/js/sticky.js"></script>
    <!-- Internal Data tables -->
    <script src="{!! asset('backend') !!}/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/dataTables.dataTables.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/dataTables.responsive.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/responsive.dataTables.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/jquery.dataTables.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/dataTables.bootstrap4.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/jszip.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/pdfmake.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/vfs_fonts.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/dataTables.responsive.min.js"></script>
    <script src="{!! asset('backend') !!}/plugins/datatable/js/responsive.bootstrap4.min.js"></script>
    <!--Internal  Datatable js -->
    <script src="{!! asset('backend') !!}/js/table-data.js"></script>

    <script src="{{ asset('js/toastr.min.js') }}"></script>
    
    <!-- custom js -->
    <script src="{!! asset('backend') !!}/js/custom.js"></script><!-- Left-menu js-->
    <script src="{!! asset('backend') !!}/plugins/side-menu/sidemenu.js"></script>

    <!-- Switcher js -->
    <script src="{!! asset('backend') !!}/switcher/js/switcher.js"></script>

    {{-- Sweetalert --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
 
    <script type="text/javascript">
        @if (session('message'))
            var alert = "{{ session('type') }}";
            var message = "{{ session('message') }}";
            switch (alert) {
            case "error":
                toastr.error(message)
                break;
            case "warning":
                toastr.warning(message)
                break;
            case "info":
                toastr.info(message)
                break;
            default:
                toastr.success(message)
                break;
            }
        @endif

        //Delete item
        $(document).on("click","#delete",function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you Want to Delete?",
                text: "Once Delete, This will be permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete)=> {
                if(willDelete) {
                window.location.href = link;
                event.preventDefault();
                }
                else{
                swal("Cancelled", "Your Data Is Safe :)", "error");
                }
            });
            });


            $(document).ready(function() {
                $('.select2').select2({
                    closeOnSelect: false
                });
            });
    </script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{!! asset('backend') !!}/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
    @yield('script')

</body>

<!-- Mirrored from laravel.spruko.com/valex/leftmenu-light-ltr/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2020 08:54:58 GMT -->
</html>