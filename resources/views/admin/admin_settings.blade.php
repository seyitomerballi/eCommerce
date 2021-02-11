@extends('layouts.admin_layout.admin_layout')
@section('title','Settings')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin Settings</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-6 col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Parola Güncelle</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('admin.settings')}}"
                                  name="updatePasswordForm" id="updatePasswordForm">
                                @csrf
                                <div class="card-body">
                                    <?php /*
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Ad</label>
                                        <input name="admin_name" id="admin_name" type="email" class="form-control"
                                               value="{{$adminDetails->name}}"
                                               placeholder="Ad giriniz...">
                                    </div> */?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin E-posta</label>
                                        <input type="email" class="form-control"
                                               value="{{$adminDetails->email}}"
                                               readonly>
                                    </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Admin E-posta</label>
                                            <input type="email" class="form-control"
                                                   value="{{$adminDetails->type}}"
                                                   readonly>
                                        </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Geçerli Parola</label>
                                        <input name="admin_current_pwd" id="admin_current_pwd" type="password" class="form-control"
                                               placeholder="Geçerli parolayı giriniz...">
                                        <span id="chkCurrentPwd"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Yeni Parola</label>
                                        <input name="admin_new_pwd" id="admin_new_pwd" type="password" class="form-control"
                                               placeholder="Yeni parolayı giriniz...">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Yeni Parolayı Onayla</label>
                                        <input name="admin_confirm_pwd" id="admin_confirm_pwd" type="password" class="form-control"
                                               placeholder="Yeni parolanızı tekrar giriniz...">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
