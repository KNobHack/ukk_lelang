@extends('layouts.app')

@section('content1')

<div class="container">
    <div class="card col-xl-6 col-lg-7 col-md-8">
        <div class="card-body">
            <h5 class="card-title">Edit Profile</h5>
            <form action="{{ url('/u/' . $user->id) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group row">
                    <label for="nama_lengkap" class="col-md-4 col-form-label text-md-right">{{ __('validation.custom.full_name') }}</label>

                    <div class="col-md-6">
                        <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="@if(old('nama_lengkap')){{ old('nama_lengkap') }}@else{{ $user->nama_lengkap }}@endif" required autocomplete="nama-lengkap" autofocus>

                        @error('nama_lengkap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_telp" class="col-md-4 col-form-label text-md-right">{{ __('validation.custom.phone_number') }}</label>

                    <div class="col-md-6">
                        <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="@if(old('no_telp')){{ old('no_telp') }}@else{{ $user->no_telp }}@endif" required autocomplete="nomor-telepon">

                        @error('no_telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-sm">{{ __('user.edit_account') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('content')
<div class="col-md-5">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Akun</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ url('/u/' . $user->id) }}" method="post">
            @csrf
            @method('put')

            <div class="card-body">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    {{-- @if(old('nama_lengkap')){{ old('nama_lengkap') }}@else{{ $user->nama_lengkap }}@endif --}}
                    <input type="text" value="{{old('nama_lengkap') ?? $user->nama_lengkap}}" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Masukkan nama lengkap">
                    @error('nama_lengkap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="text" value="@if(old('no_telp')){{ old('no_telp') }}@else{{ $user->no_telp }}@endif" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Masukkan nomor telepon">
                    @error('no_telp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!--
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                </div>
                -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection
