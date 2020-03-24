@extends('layouts.app')

@section('content-header')
{{ __('user.table_title') }}
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Nama Lengkap</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $user->nama_lengkap }}</td>
                        <td class="text-right">
                            @if(Auth::user()->id != $user->id)
                            @if(!$user->is_admin)
                            <a class="btn btn-success btn-sm" href="/u/{{ $user->id }}/pro"><span class="text-white">Promote</span></a>
                            @else
                            <a class="btn btn-secondary btn-sm" href="/u/{{ $user->id }}/dem"><span class="text-white">Demote</span></a>
                            @endif
                            @endif
                            <a class="btn btn-primary btn-sm" href="/u/{{ $user->id }}"><span class="text-white">Detail</span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
