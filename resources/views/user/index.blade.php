@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('user.table_title') }}</h3>

        <!--
        <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
        -->
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">No.</th>
                    <th>Nama Lengkap</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama_lengkap }}</td>
                    <td>
                        @if(Auth::user()->id != $user->id)
                        @if(!$user->is_admin)
                        <a class="badge bg-success" href="/u/{{ $user->id }}/pro">Promote</span></a>
                        @else
                        <a class="badge bg-secondary" href="/u/{{ $user->id }}/dem">Demote</span></a>
                        @endif
                        @endif
                        <a class="badge bg-primary" href="/u/{{ $user->id }}">Detail</span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
