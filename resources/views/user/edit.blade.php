@extends('layouts.app')

@section('content')
<div class="col-md-5">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Akun</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ url('/u/' . $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card-body">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    {{-- @if(old('nama_lengkap')){{ old('nama_lengkap') }}@else{{ $user->nama_lengkap }}@endif --}}
                    <input type="text" value="{{old('nama_lengkap') ?? $user->nama_lengkap}}" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Masukkan nama lengkap">
                    @error('nama_lengkap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="text" value="@if(old('no_telp')){{ old('no_telp') }}@else{{ $user->no_telp }}@endif" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Masukkan nomor telepon">
                    @error('no_telp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="profile">Foto profile</label>
                    <div class="custom-file">
                        <input type="file" name="profile" class="custom-file-input @error('profile') is-invalid @enderror" id="profile">
                        <label class="custom-file-label" for="profile">Pilih file</label>
                        @error('profile')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('js')
<script>
    // Ubah nama label menjadi nama file
    $('#profile').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

</script>
@endsection
