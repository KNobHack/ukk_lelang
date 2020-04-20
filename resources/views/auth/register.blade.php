@extends('layouts.guest')

@section('mode', 'register')

@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="#">{{ config('app.name') }}</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Nama lengkap">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('nama_lengkap')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Nomor telepon">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                    @error('no_telp')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ml-auto">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ route('login') }}" class="text-center">Sudah punya akun</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection
