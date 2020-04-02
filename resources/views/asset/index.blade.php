@extends('layouts.app')

@section('content1')
@if(session('pesan'))
<div class="alert alert-success" role="alert">
    {{ session('pesan') }}
</div>
@endif

<a href="/assets/create" class="btn btn-primary mb-2">Tambah asset</a>
@foreach($assets as $asset)
<div class="row">
    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-12">
        <div class="card mb-4">
            <!-- <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap"> -->
            <div class="card-body">
                <h5 class="card-title">{{ $asset->game }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $asset->identifier }}</h6>
                <p class="card-text">{{ $asset->deskripsi }}</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-sm btn-success btn-block">Jual</a>
                <a href="/assets/{{ $asset->id }}" class="btn btn-sm btn-info btn-block text-white">Detail</a>
                <a href="/assets/{{ $asset->id }}/edit" class="btn btn-sm btn-primary btn-block mb-2">Edit</a>
                <form method="post" action="/assets/{{ $asset->id }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger btn-block">hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

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
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                                </div>
                            </div>
                            <small>
                                57% Complete
                            </small>
                        </td>
                        <td class="project-state">
                            @if($asset->lelang)
                            @if($asset->lelang->status)
                            <span class="badge badge-primary">Terjual</span>
                            @else
                            <span class="badge badge-success">Dijual</span>
                            @endif
                            @else
                            <span class="badge badge-danger">Belum dijual</span>
                            @endif
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-success btn-sm" href="#">
                                <i class="fas fa-shopping-cart">
                                </i>
                                Jual
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{ url('/assets/' . $asset->id) }}">
                                <i class="fas fa-info">
                                </i>
                                Detail
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-account-modal{{ $asset->id }}">
                                <i class="fas fa-trash">
                                </i>
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <!-- Lain kali jangan gini ngodingnya!!!, pake javascript dong. dasar aku -->
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
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<a href="{{ url('/assets/create') }}" class="btn btn-success float-right">Tambah Asset</a>
@endsection
