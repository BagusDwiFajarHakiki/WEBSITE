@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Usaha BUMDes</h1>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tombol Tambah --}}
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
        + Tambah Usaha
    </button>

    {{-- Daftar Usaha dalam Card --}}
    <div class="row">
        @forelse($list as $usaha)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($usaha->fotopath)
                        <img src="{{ asset('storage/' . $usaha->fotopath) }}" 
                             class="card-img-top" 
                             alt="Foto Usaha" 
                             style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                            <small>Tidak ada foto</small>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $usaha->name }}</h5>
                        <p class="card-text">{{ Str::limit($usaha->deskripsi, 100) }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <div>
                            <button class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal{{ $usaha->id }}">
                                Edit
                            </button>
                            <form action="{{ route('usaha_bumdes.destroy', $usaha->id) }}" 
                                  method="POST" 
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin mau hapus?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Edit --}}
            <div class="modal fade" id="editModal{{ $usaha->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('usaha_bumdes.update', $usaha->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Usaha</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Nama Usaha</label>
                                    <input type="text" name="name" class="form-control" value="{{ $usaha->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" required>{{ $usaha->deskripsi }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Foto</label>
                                    <input type="file" name="foto" class="form-control">
                                    @if($usaha->fotopath)
                                        <img src="{{ asset('storage/' . $usaha->fotopath) }}" class="mt-2" width="100">
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">Belum ada data usaha.</div>
            </div>
        @endforelse
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('usaha_bumdes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Usaha Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Usaha</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection