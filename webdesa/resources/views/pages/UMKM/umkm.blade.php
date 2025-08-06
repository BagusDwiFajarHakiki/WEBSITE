@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA UMKM</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#tambahUmkmModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data UMKM
        </button>
    </div>

    <!-- Modal Tambah UMKM -->
    <div class="modal fade" id="tambahUmkmModal" tabindex="-1" role="dialog" aria-labelledby="tambahUmkmModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahUmkmModalLabel">Tambah Data UMKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="foto">Foto UMKM</label>
                  <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                </div>
                <div class="form-group">
                  <label for="nama">Nama UMKM</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                  <label for="pemilik">Pemilik</label>
                  <input type="text" class="form-control" id="pemilik" name="pemilik" required>
                </div>
                <div class="form-group">
                  <label for="alamat">Link Lokasi Google Maps</label>
                  <input type="url" class="form-control" id="alamat" name="alamat" placeholder="https://maps.google.com/..." required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi UMKM</label>
                  <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Tabel Data UMKM -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama UMKM</th>
                            <th>Pemilik</th>
                            <th>Alamat</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($umkm as $umkm)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($umkm->foto)
                                        <img src="{{ asset('storage/' . $umkm->foto) }}" alt="Foto UMKM" width="80">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>{{ $umkm->nama }}</td>
                                <td>{{ $umkm->pemilik }}</td>
                                <td>
                                    <a href="{{ $umkm->alamat }}" target="_blank">Lihat Lokasi</a>
                                </td>
                                <td>{{ $umkm->deskripsi }}</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data UMKM.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection