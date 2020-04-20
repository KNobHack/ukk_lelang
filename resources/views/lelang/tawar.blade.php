@extends('layouts.app')

@section('content-header','Tawar')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <h3 class="text-secondary"><i class="fas fa-paint-brush"></i>{{ $lelang->asset->game }}</h3>
                    <p class="text-muted">{{ $lelang->asset->deskripsi }}</p>

                    <h5 class="mt-2">In Game Name</h5>
                    <span class="d-block text-muted">{{ $lelang->asset->identifier }}</span>

                    <h5 class="mt-3">Genre Game</h5>
                    <ul class="list-unstyled text-muted">
                        @foreach($lelang->asset->genres as $genre)
                        <li>{{ $genre->genre }}</li>
                        @endforeach
                    </ul>
                    <div class="text-center mt-5 mb-3">
                        {{-- <a href="{{ url('/assets/' . $lelang->asset->id . '/edit') }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i>Edit</a> --}}
                        {{-- <button href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-account-modal"><i class="fas fa-trash"></i>Hapus</button> --}}
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Harga</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form method="post" id="form-harga" action="{{ url('/lelang/' . $lelang->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="harga_awal">Harga tarawan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" name="harga_tawaran" min="0" id="harga_awal" class="form-control" required>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row mb-2">
    <div class="col-12">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        <a href="#" class="btn btn-success float-right" onclick="event.preventDefault();document.getElementById('form-harga').submit()">Tawar</a>
    </div>
</div>
@endsection
