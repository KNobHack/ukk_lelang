@extends('layouts.app')

@section('content1')

<div class="container">
    <div class="card col-xl-6 col-lg-7 col-md-8">
        <div class="card-body">
            <h5 class="card-title">Tambah Asset</h5>
            <form action="{{ url('/assets') }}" method="post">
                @csrf

                <div class="form-group row">
                    <label for="game" class="col-md-3 col-form-label text-md-left">Nama game</label>

                    <div class="col-md-9">
                        <input id="game" type="text" class="form-control @error('game') is-invalid @enderror" name="game" autofocus required>

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
                    <label class="col-md-3 col-form-label text-md-left">Genre</label>

                    <div class="col-md-9">
                        @foreach($genres as $genre)

                        @if($loop->iteration % 2 != 0)
                        <div class="row">
                            @endif
                            <div class="col-6">
                                <div class="form-check">
                                    <input id="{{ $genre->genre }}" name="{{ $genre->genre }}" value="{{ $genre->id }}" type="checkbox" class="form-check-input">
                                    <label for="{{ $genre->genre }}" class="form-check-label">{{ $genre->genre }}</label>
                                </div>
                            </div>

                            @if($loop->iteration % 2 == 0)
                        </div>
                        @endif

                        @endforeach

                        @if($genres->count() % 2 != 0)
                    </div>
                    @endif
                </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>

@endsection

@section('css-plugin')
<link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.css') }}">
@endsection

@section('content-header', 'Tambah asset')

@section('content')
<div class="col-sm-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah asset</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('/assets') }}">
                @csrf
                <div class="form-group">
                    <label for="game">Nama game</label>
                    <input type="text" name="game" id="game" value="@old('game')" class="form-control @error('game') is-invalid @enderror" required autofocus>
                    @error('game')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="identifier">IGN</label>
                    <input type="text" name="identifier" id="identifier" value="@old('identifier')" class="form-control @error('identifier') is-invalid @enderror" required>
                    @error('identifier')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" value="@old('deskripsi')" class="form-control @error('deskripsi') is-invalid @enderror" rows="4"></textarea>
                    @error('deskripsi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <select name="genre[]" id="genre" class="genres @error('genre') is-invalid @enderror" multiple=" multiple" data-placeholder="Pilih Genre" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                        @endforeach
                    </select>
                    @error('genre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
@section('js-plugin')
<script src="{{ asset('vendor/select2/dist/js/select2.js') }}"></script>
@endsection
@section('js')
<script src="{{ asset('js/pages/asset/create.js') }}"></script>
@endsection
