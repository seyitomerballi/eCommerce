@extends('layouts.admin_layout.admin_layout')
@section('title','Login')
@section('content')
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{route('admin.login')}}"><b>Admin</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Oturumunuzu başlatmak için oturum açın.</p>

                    @if(Session::has('error_message'))
                        <div class="alert alert-danger">
                            {{ Session::get('error_message') }}
                            @php
                                Session::forget('error_message');
                            @endphp
                        </div>
                    @endif

                    <form action="{{route('admin.login')}}" method="post" autocomplete="off">

                        @csrf
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input name="email" id="email" type="text" class="form-control" placeholder="E-posta">

                                <div class="input-group-append">
                                    <div class="input-group-text">

                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input name="password" value="password" type="password" class="form-control"
                                       placeholder="Şifre">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Beni Hatırla
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
    </div>
@endsection
