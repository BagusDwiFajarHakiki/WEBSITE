@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA GALLERY</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#galleryModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Gallery
        </button>
    </div>

    <!-- Tabel Data -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @if($gallery->isEmpty())
                <div class="text-center text-muted my-4">
                    <i class="fas fa-info-circle fa-2x mb-2"></i>
                    <p class="mb-0">Tidak ada data</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $index => $gallery)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $gallery->judul }}</td>
                                    <td>{{ ucfirst($gallery->isi) }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$gallery->gambar) }}" alt="{{ $gallery->judul }}" width="80">
                                    </td>
                                    <td>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
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

                <form action="{{ route('gallery') }}" method="POST" enctype="multipart/form-data">
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

                        <!-- Isi Berita -->
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
