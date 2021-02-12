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
                        <h1 class="m-0 text-dark">Admin Settings</h1>
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
                        <!-- Success and error Alerts-->
                        <!-- Success Alert -->
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i>Başarılı!</h5>
                                {{ Session::get('success_message') }}
                                @php
                                    Session::forget('success_message');
                                @endphp
                            </div>
                        @endif
                    <!-- /.Success Alert -->
                        <!-- Error Alert -->
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i>Hata!</h5>
                                {{ Session::get('error_message') }}
                                @php
                                    Session::forget('error_message');
                                @endphp
                            </div>
                    @endif
                    <!-- /.Error Alert -->
                        <!-- /.Success and error Alerts-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Parola Güncelle</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('admin.updateCurrentPassword')}}"
                                  name="updatePasswordForm" id="updatePasswordForm">
                                @csrf
                                <div class="card-body">
                                    <?php /*
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Ad</label>
                                        <input name="admin_name" id="admin_name" type="email" class="form-control"
                                               value="{{$adminDetails->name}}"
                                               placeholder="Ad giriniz...">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin E-posta</label>
                                        <input type="email" class="form-control"
                                               value="{{$adminDetails->email}}"
                                               readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Rol</label>
                                        <input type="email" class="form-control"
                                               value="{{$adminDetails->type}}"
                                               readonly>
                                    </div>
                                            */?>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Geçerli Parola</label>
                                        <input name="admin_current_pwd" id="admin_current_pwd" type="password"
                                               class="form-control"
                                               placeholder="Geçerli parolayı giriniz...">
                                        <span id="chkCurrentPwd"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Yeni Parola</label>
                                        <input name="admin_new_pwd" id="admin_new_pwd" type="password"
                                               class="form-control"
                                               placeholder="Yeni parolayı giriniz...">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Yeni Parolayı Onayla</label>
                                        <input name="admin_confirm_pwd" id="admin_confirm_pwd" type="password"
                                               class="form-control"
                                               placeholder="Yeni parolanızı tekrar giriniz...">
                                        <span id="chkCheckPwd"></span>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn">
                                        <a class="btn btn-app btn-success mx-0">
                                            <i class="fas fa-save"></i> Kaydet
                                        </a>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-xl-6 col-lg-8 col-md-6 col-12">
                        <!-- Success and error Alerts-->
                        <!-- Success Alert -->
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <h5><i class="icon fas fa-check"></i>Başarılı!</h5>
                                {{ Session::get('success_message') }}
                                @php
                                    Session::forget('success_message');
                                @endphp
                            </div>
                        @endif
                    <!-- /.Success Alert -->
                        <!-- Error Alert -->
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <h5><i class="icon fas fa-check"></i>Hata!</h5>
                                {{ Session::get('error_message') }}
                                @php
                                    Session::forget('error_message');
                                @endphp
                            </div>
                    @endif
                    <!-- /.Error Alert -->
                        <!-- /.Success and error Alerts-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Admin Detayları</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('admin.updateAdminDetails')}}"
                                  name="updateAdminDetailsForm" id="updateAdminDetailsForm">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Admin E-posta</label>
                                        <input type="email" class="form-control"
                                               value="{{$adminDetails->email}}"
                                               readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Admin Rol</label>
                                        <input type="text" class="form-control"
                                               value="{{$adminDetails->type}}"
                                               readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Admin Ad</label>
                                        <input name="admin_name" id="admin_name" type="text"
                                               class="form-control @if($errors->has('admin_name')) is-invalid @endif"
                                               value="{{$adminDetails->name}}"
                                               placeholder="Ad giriniz...">
                                        @if($errors->has('admin_name'))
                                            <span id="admin_name_err" style="color: red">{{$errors->first('admin_name')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefon Numarası</label>
                                        <input name="admin_phone" id="admin_phone" type="text"
                                               class="form-control @if($errors->has('admin_phone')) is-invalid @endif"
                                               value="{{$adminDetails->phone}}"
                                               placeholder="Telefon numarası giriniz...">
                                        @if($errors->has('admin_phone'))
                                            <span id="admin_phone_err" style="color: red">{{$errors->first('admin_phone')}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="admin_image">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control"
                                                       name="admin_image" id="admin_image">
                                                <label class="custom-file-label" for="admin_image">Resim dosyasını
                                                    seçin...</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Yükle</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn">
                                        <a class="btn btn-app btn-success mx-0">
                                            <i class="fas fa-save"></i> Kaydet
                                        </a>
                                    </button>
                                </div>
                            </form>
                        </div>
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
