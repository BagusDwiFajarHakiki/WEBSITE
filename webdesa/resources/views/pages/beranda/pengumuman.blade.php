@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">PENGUMUMAN</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Form Tambah Pengumuman -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Buat Pengumuman Baru</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Pengumuman</label>
                    <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Daftar Pengumuman -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Daftar Pengumuman</h5>
        </div>
        <div class="card-body">
            @if(isset($pengumuman) && count($pengumuman) > 0)
                <ul class="list-group">
                    @foreach($pengumuman as $item)
                        <li class="list-group-item">
                            <strong>{{ $item->judul }}</strong><br>
                            <span>{{ $item->isi }}</span><br>
                            <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Tidak ada pengumuman.</p>
            @endif
        </div>
    </div>
@endsection