<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.admin_layout.admin_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@if(Request::path() !== 'admin')
    @include('layouts.admin_layout.admin_header')
    @include('layouts.admin_layout.admin_sidebar')
@endif

@yield('content')

@if(Request::path() !== 'admin')
    @include('layouts.admin_layout.admin_footer')
    <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
</div>
@endif
<!-- ./wrapper -->
@include('layouts.admin_layout.admin_scripts')
</body>
</html>
