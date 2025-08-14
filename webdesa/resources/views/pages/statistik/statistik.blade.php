@extends('layout.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA STATISTIK DESA</h1>
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
            <form action="{{ route('statistik-desa.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="luas_wilayah">Luas Wilayah (Ha)</label>
                    <input type="number" step="0.01" class="form-control" id="luas_wilayah" name="luas_wilayah" value="{{ old('luas_wilayah', $statistik->luas_wilayah ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_dusun">Jumlah Dusun</label>
                    <input type="number" class="form-control" id="jumlah_dusun" name="jumlah_dusun" value="{{ old('jumlah_dusun', $statistik->jumlah_dusun ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_penduduk">Jumlah Penduduk</label>
                    <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" value="{{ old('jumlah_penduduk', $statistik->jumlah_penduduk ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_rt">Jumlah RT</label>
                    <input type="number" class="form-control" id="jumlah_rt" name="jumlah_rt" value="{{ old('jumlah_rt', $statistik->jumlah_rt ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_rw">Jumlah RW</label>
                    <input type="number" class="form-control" id="jumlah_rw" name="jumlah_rw" value="{{ old('jumlah_rw', $statistik->jumlah_rw ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="mata_pencaharian_utama">Mata Pencaharian Utama</label>
                    <input type="text" class="form-control" id="mata_pencaharian_utama" name="mata_pencaharian_utama" value="{{ old('mata_pencaharian_utama', $statistik->mata_pencaharian_utama ?? '') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection