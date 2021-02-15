<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('images/admin_img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Paneli</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/admin_img/admin_photos'.Auth::guard('admin')->user()->image)}}"
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ucwords($adminDetails->name)}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if(Session::get('page') === "dashboard")
                    <?php $active = "active"; ?>
                @else
                    <?php $active = ""; ?>
                @endif
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if(Session::get('page') === "settings")
                    <?php $active = "active"; ?>
                @else
                    <?php $active = ""; ?>
                @endif
                <li class="nav-item">
                    <a href="{{route('admin.settings')}}" class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
