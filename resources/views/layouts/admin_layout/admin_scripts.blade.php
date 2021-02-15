<!-- jQuery -->
<script src=" {{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src=" {{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=" {{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src=" {{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src=" {{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src=" {{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src=" {{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src=" {{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src=" {{ asset('plugins/moment/moment.min.js')}}"></script>
<script src=" {{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=" {{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src=" {{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src=" {{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- AdminLTE App -->
<script src=" {{ asset('js/admin_js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=" {{ asset('js/admin_js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src=" {{ asset('js/admin_js/demo.js')}}"></script>
<!-- Custom Admin Scripts -->
<script src=" {{ asset('js/admin_js/admin_script.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Success and error Alerts-->
<script>
    @if(Session::has('success_message'))
    toastr.success({{ Session::get('success_message') }});
    @php
        Session::forget('success_message');
    @endphp
    @endif
    @if(Session::has('error_message'))
    toastr.success({{ Session::get('error_message') }});
    @php
        Session::forget('error_message');
    @endphp
    @endif

</script>
<!-- /.Success and error Alerts-->
