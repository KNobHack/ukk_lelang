@extends('layouts.app')

@section('content')
<div class="col-md-4">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('/storage/profile/' . $user->image) }}" alt="{{ $user->nama_lengkap }}">
            </div>

            <h3 class="profile-username text-center">{{ $user->nama_lengkap }}</h3>

            <p class="text-muted text-center">Bergabung sejak {{ $user->created_at->format('d, M Y') }}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                </li>
                <li class="list-group-item">
                    <b>No. Telp</b> <a class="float-right">{{ $user->no_telp }}</a>
                </li>
            </ul>

            <a href="{{ url('/u/' . $user->id . '/edit') }}" class="btn btn-primary btn-block"><b>Edit</b></a>
            @if(Auth::user()->id === $user->id)
            <a href="#" class="btn btn-success btn-block"><b>Ubah Password</b></a>
            @endif
            @if($user->is_admin)
            <a href="#" class="btn btn-danger btn-block"><b>Ban user</b></a>
            @endif
            <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete-account-modal"><b>Hapus akun</b></button>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
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
