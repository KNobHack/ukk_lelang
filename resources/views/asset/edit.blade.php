@extends('layouts.app')

@section('css-plugin')
<link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.css') }}">
@endsection

@section('content-header', 'Edit asset')

@section('content')
<div class="col-sm-6">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Edit asset</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('/assets/'. $asset->id) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="game">Nama game</label>
                    <input type="text" name="game" id="game" value="{{ old('game') ?? $asset->game }}" class="form-control @error('game') is-invalid @enderror" required autofocus>
                    @error('game')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="identifier">IGN</label>
                    <input type="text" name="identifier" id="identifier" value="{{ old('identifier') ?? $asset->identifier }}" class="form-control @error('identifier') is-invalid @enderror" required>
                    @error('identifier')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi') ?? $asset->deskripsi}}</textarea>
                    @error('deskripsi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <select name="genre[]" id="genre" class="genres @error('genre') is-invalid @enderror" multiple="multiple" data-placeholder="Pilih Genre" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        <?php
                        // Refill old value of genres
                        if(old('genre')){
                            foreach(old('genre') as $og){
                                $fill_genres[$og] = true;
                            }
                        } else {
                            foreach($asset->genres as $og){
                                $fill_genres[$og->id] = true;
                            }
                        }
                        ?>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" @if(isset($fill_genres[$genre->id])) selected @endif>{{ $genre->genre }}</option>
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
<a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">Kembali</a>
@endsection
@section('js-plugin')
<script src="{{ asset('vendor/select2/dist/js/select2.js') }}"></script>
@endsection
@section('js')
<script src="{{ asset('js/pages/asset/create.js') }}"></script>
@endsection
