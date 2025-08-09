@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">PENGUMUMAN</h1>
    </div>

    <!-- Form Tambah Pengumuman -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Buat Pengumuman Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('simpan_pengumuman') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Pengumuman</label>
                    <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar (opsional)</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
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
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Pengumuman" 
                                     style="max-width: 200px; display:block; margin-top:10px;">
                            @endif
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
