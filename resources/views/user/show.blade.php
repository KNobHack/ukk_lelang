@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card col-xl-6 col-lg-7 col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $user->nama_lengkap }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ __('user.join_at') . ' ' . $user->created_at->format('d, M Y')}}</h6>

                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td>{{ $user->no_telp }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="#" class="btn btn-success mt-2">{{ __('user.edit_account') }}</a>
                @if(!Auth::user()->is_admin)
                    <a href="#" class="btn btn-warning mt-2">{{ __('user.change_password') }}</a>
                @endif
                <a href="#" class="btn btn-danger mt-2">{{ __('user.delete_account') }}</a>
            </div>
        </div>
    </div>

@endsection