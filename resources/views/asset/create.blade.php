@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card col-xl-6 col-lg-7 col-md-8">
        <div class="card-body">
            <h5 class="card-title">Tambah Asset</h5>
            <form action="{{ url('/assets') }}" method="post">
                @csrf

                <div class="form-group row">
                    <label for="game" class="col-md-3 col-form-label text-md-left">Nama game</label>

                    <div class="col-md-9">
                        <input id="game" type="text" class="form-control @error('game') is-invalid @enderror" name="game" required autocomplete="nama-lengkap" autofocus required>

                        @error('game')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="identifier" class="col-md-3 col-form-label text-md-left">IGN</label>

                    <div class="col-md-9">
                        <input id="identifier" type="text" class="form-control @error('identifier') is-invalid @enderror" name="identifier" required>

                        @error('identifier')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="deskripsi" class="col-md-3 col-form-label text-md-left">Deskripsi</label>

                    <div class="col-md-9">
                        <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required></textarea>

                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="deskripsi" class="col-md-3 col-form-label text-md-left">Genre</label>

                    <div class="col-md-9">
                        @foreach($genres as $genre)

                        @if($loop->iteration % 2 != 0)
                        <div class="row">
                            @endif
                            <div class="col-6">

                                <div class="form-check">
                                    <input id="{{ $genre->genre }}" name="{{ $genre->genre }}" value="{{ $genre->id }}" type="checkbox" class="form-check-input">
                                    <label for="{{ $genre->genre }}" class="form-check-label">{{ $genre->genre }}</label>

                                    @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            @if($loop->iteration % 2 == 0)
                        </div>
                        @endif

                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
