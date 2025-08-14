@extends('layout.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA KEPALA DESA</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kepala-desa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $kepalaDesa->nama ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $kepalaDesa->jabatan ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Foto Kepala Desa</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                    @if(isset($kepalaDesa->gambar))
                        <small class="form-text text-muted mt-2">Gambar saat ini:</small>
                        <img src="{{ asset('storage/kepala-desa/' . $kepalaDesa->gambar) }}" alt="Foto Kepala Desa" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection