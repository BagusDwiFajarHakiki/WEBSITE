@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA GALLERY</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Main Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Artikel Berita</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('gallery') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul Berita -->
                <div class="form-group">
                    <label for="judul">Judul Berita</label>
                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul berita" required>
                </div>

                <!-- Kategori -->
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="politik">Politik</option>
                        <option value="ekonomi">Ekonomi</option>
                        <option value="pendidikan">Pendidikan</option>
                        <option value="pariwisata">Pariwisata</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Tanggal Publish -->
                <div class="form-group">
                    <label for="tanggal">Tanggal Publish</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                <!-- Upload Gambar -->
                <div class="form-group">
                    <label for="gambar">Upload Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control-file" accept="image/*" required>
                </div>

                <!-- Isi Berita -->
                <div class="form-group">
                    <label for="isi">Isi Berita</label>
                    <textarea name="isi" id="isi" rows="6" class="form-control" placeholder="Tulis isi berita..." required></textarea>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-secondary mr-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
