@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA GALLERY</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#galleryModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Gallery
        </button>
    </div>

    <!-- Daftar Gallery dalam Card -->
    <div class="row">
        @if($gallery->isEmpty())
            <div class="col-12">
                <div class="text-center text-muted my-4">
                    <i class="fas fa-info-circle fa-2x mb-2"></i>
                    <p class="mb-0">Tidak ada data</p>
                </div>
            </div>
        @else
            @foreach($gallery as $index => $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ ucfirst($item->isi) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Modal Tambah Gallery -->
    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryModalLabel">Tambah Artikel Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Judul Berita -->
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul galery" required>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="form-group">
                            <label for="gambar">Upload Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control-file" accept="image/*" required>
                        </div>

                        <!-- Isi Gallery -->
                        <div class="form-group">
                            <label for="isi">Isi Gallery</label>
                            <textarea name="isi" id="isi" rows="6" class="form-control" placeholder="Tulis isi berita..." required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection