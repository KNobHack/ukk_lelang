@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/assets/create" class="btn btn-primary mb-2">Tambah asset</a>
    @foreach($assets as $asset)
    @if($loop->iteration % 4 == 1)
    <div class="row">
        @endif

        <div class="col-lg-3 col-xl-3 col-md-6 col-sm-12">
            <div class="card mb-4">
                <!-- <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title">{{ $asset->deskripsi }}</h5>
                    <p class="card-text">{{ $asset->identifier }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($asset->genres as $genre)
                    <li class="list-group-item">{{ $genre->genre }}</li>
                    @endforeach
                </ul>
                <div class="card-body">
                    <a href="#" class="btn btn-sm btn-success btn-block">Jual</a>
                    <a href="/assets/{{ $asset->id }}/edit" class="btn btn-sm btn-warning btn-block mb-2">Edit</a>
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
