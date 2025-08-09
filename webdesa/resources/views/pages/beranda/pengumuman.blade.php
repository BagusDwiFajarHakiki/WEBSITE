@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">PENGUMUMAN</h1>
        <!-- Tombol tambah pengumuman -->
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahPengumumanModal">
            + Tambah Pengumuman
        </button>
    </div>

    <!-- Modal Tambah Pengumuman -->
    <div class="modal fade" id="tambahPengumumanModal" tabindex="-1" aria-labelledby="tambahPengumumanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPengumumanLabel">Buat Pengumuman Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
        </div>
    </div>

        <!-- Daftar Pengumuman -->
    <div class="row">
        @if(isset($pengumuman) && count($pengumuman) > 0)
            @foreach($pengumuman as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" 
                                class="card-img-top" 
                                alt="Gambar Pengumuman" 
                                style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ Str::limit($item->isi, 100) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                            <div>
                                <!-- Tombol Edit -->
                                <button class="btn btn-warning btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editPengumumanModal{{ $item->id }}">
                                    Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <button class="btn btn-danger btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#hapusPengumumanModal{{ $item->id }}">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editPengumumanModal{{ $item->id }}" tabindex="-1" aria-labelledby="editPengumumanLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPengumumanLabel{{ $item->id }}">Edit Pengumuman</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update_pengumuman', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="judul" value="{{ $item->judul }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="isi" class="form-label">Isi Pengumuman</label>
                                        <textarea class="form-control" name="isi" rows="3" required>{{ $item->isi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar (opsional)</label>
                                        <input type="file" class="form-control" name="gambar" accept="image/*">
                                        @if($item->gambar)
                                            <small class="text-muted">Gambar saat ini:</small><br>
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" style="max-width: 100px; margin-top: 5px;">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Hapus -->
                <div class="modal fade" id="hapusPengumumanModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusPengumumanLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="hapusPengumumanLabel{{ $item->id }}">Hapus Pengumuman</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                Yakin ingin menghapus pengumuman <strong>{{ $item->judul }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="{{ route('hapus_pengumuman', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @else
            <div class="col-12">
                <p class="text-center text-muted">Belum ada pengumuman</p>
            </div>
        @endif
    </div>

@endsection
