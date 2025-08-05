@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">VIDEO PROFIL</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Form Input Video, Foto, dan Slogan -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Input Video, Foto, dan Slogan Desa Pasiraman</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="video" class="form-label">Upload Video Profil</label>
                    <input type="file" class="form-control" id="video" name="video" accept="video/*" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Upload Foto Profil</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="slogan" class="form-label">Slogan Desa Pasiraman</label>
                    <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Masukkan slogan" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection