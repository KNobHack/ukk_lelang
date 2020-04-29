@extends('layouts.app')

@section('content-header', 'Assets')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Assets</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            No.
                        </th>
                        <th style="width: 20%">
                            Nama Game - IGN
                        </th>
                        <th>
                            Project Progress
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 30%">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assets as $asset)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <a>
                                {{ $asset->game }}
                            </a>
                            <br />
                            <small>
                                {{ $asset->identifier }}
                            </small>
                        </td>
                        <td class="project_progress">
                            @if($asset->lelang)
                                @if($asset->lelang->status)
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="{{ $asset->siswa_waktu_persen }}" aria-volumemin="0" aria-volumemax="100" style="width: {{ $asset->siswa_waktu_persen }}%">
                                        </div>
                                    </div>
                                    <small>
                                        Siswa waktu {{ $asset->siswa_waktu }}
                                    </small>
                                @else
                                <small>
                                    Lelang selesai
                                </small>
                                @endif
                            @else
                            <small>
                                Belum di jual
                            </small>
                            @endif
                        </td>
                        <td class="project-state">
                            @if($asset->lelang)
                                @if($asset->lelang->status)
                                    <span class="badge badge-success">Sedang di lelang</span>
                                @else
                                    <span class="badge badge-primary">Terjual</span>
                                @endif
                            @else
                                <span class="badge badge-danger">Belum dijual</span>
                            @endif
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ ($asset->lelang) ? url('/lelang/' . $asset->id) : url('/assets/' . $asset->id) }}">
                                <i class="fas fa-info"></i> Detail
                            </a>
                            @if(!$asset->lelang)
                                <a class="btn btn-success btn-sm" href="{{ url('/lelang/create/' . $asset->id) }}">
                                    <i class="fas fa-shopping-cart"></i> Jual
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ url('/assets/' . $asset->id . '/edit') }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                            @endif
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-account-modal{{ $asset->id }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<a href="{{ url('/assets/create') }}" class="btn btn-success float-right">Tambah Asset</a>

<!-- Lain kali jangan gini ngodingnya!!!, pake javascript dong. dasar aku -->
@foreach($assets as $asset)
<div class="modal fade" id="delete-account-modal{{ $asset->id }}">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Yakin ingin menghapus?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Data yang sudah di hapus tidak bisa di pulihkan kembali&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                <form action="{{ url('/assets/' . $asset->id) }}" method="post">
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
@endforeach
@endsection
