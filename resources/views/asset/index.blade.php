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
                        <span class="badge badge-success">Success</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-success btn-sm" href="#">
                            <i class="fas fa-shopping-cart">
                            </i>
                            Jual
                        </a>
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-info">
                            </i>
                            Detail
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Hapus
                        </a>
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
