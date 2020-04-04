@extends('layouts.app')

@section('content-header', 'Detail Asset')

@section('content')

<!-- Default box -->
<div class="card col-md-6">
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
            <h3 class="text-secondary"><i class="fas fa-paint-brush"></i>{{ $asset->game }}</h3>
            <p class="text-muted">{{ $asset->deskripsi }}</p>

            <h5 class="mt-2">In Game Name</h5>
            <span class="d-block text-muted">{{ $asset->identifier }}</span>

            <h5 class="mt-3">Genre Game</h5>
            <ul class="list-unstyled text-muted">
                @foreach($asset->genres as $genre)
                <li>{{ $genre->genre }}</li>
                @endforeach
            </ul>
            <div class="text-center mt-5 mb-3">
                <a href="{{ url('/assets/' . $asset->id . '/edit') }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i>Edit</a>
                <button href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-account-modal"><i class="fas fa-trash"></i>Hapus</button>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<div class="modal fade" id="delete-account-modal">
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
<a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Kembali</a>
@endsection
