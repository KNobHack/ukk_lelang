@extends('layouts.app')

@section('content')

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

                    <button type="submit" class="btn btn-primary">{{ __('user.edit_account') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection