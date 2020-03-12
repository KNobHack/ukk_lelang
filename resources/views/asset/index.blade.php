@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('pesan'))
    <div class="alert alert-success" role="alert">
        {{ session('pesan') }}
    </div>
    @endif

    <a href="/assets/create" class="btn btn-primary mb-2">Tambah asset</a>
    @foreach($assets as $asset)
    @if($loop->iteration % 4 == 1)
    <div class="row">
        @endif

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

        @if($loop->iteration % 4 == 0)
    </div>
    @endif
    @endforeach
    @if($assets->count() % 4 != 0)
</div>
@endif
</div>
@endsection
