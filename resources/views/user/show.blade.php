@extends('layouts.app')

@section('content')
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

        <a href="{{ url('/u/' . $user->id) }}/edit" class="btn btn-primary btn-block btn-sm mt-2">{{ __('user.edit_account') }}</a>
        @if(!Auth::user()->id === $user->id)
        <a href="#" class="btn btn-success btn-block btn-sm mt-2">{{ __('user.change_password') }}</a>
        @endif
        <button type="submit" class="btn btn-danger btn-block btn-sm mt-2" data-toggle="modal" data-target="#delete-account-modal">{{ __('user.delete_account') }}</button>
    </div>
</div>

<div class="modal fade" id="delete-account-modal">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Yakin ingin menghapus akun?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Akun yang sudah di hapus tidak bisa di pulihkan kembali&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <form action="{{ url('/u/' . $user->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection
