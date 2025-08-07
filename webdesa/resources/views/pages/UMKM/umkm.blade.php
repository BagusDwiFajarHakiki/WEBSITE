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
        <form action="/simpan_umkm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
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
                        <label for="nama_umkm">Nama UMKM</label>
                        <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" required>
                    </div>
                    <div class="form-group">
                        <label for="pemilik">Pemilik</label>
                        <input type="text" class="form-control" id="pemilik" name="pemilik" required>
                    </div>
                    <div class="form-group">
                        <label for="kontak">Nomor WhatsApp (Kontak)</label>
                        <input type="text" class="form-control" id="kontak" name="kontak" placeholder="e.g., +6281234567890" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Link Lokasi Google Maps</label>
                        <input type="url" class="form-control" id="alamat" name="alamat" placeholder="Salin link Google Maps di sini (contoh: https://maps.app.goo.gl/...)" required>
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

<!-- Modal Edit UMKM -->
<div class="modal fade" id="editUmkmModal" tabindex="-1" role="dialog" aria-labelledby="editUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="edit-umkm-form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUmkmModalLabel">Edit Data UMKM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_foto">Foto UMKM</label>
                        <input type="file" class="form-control" id="edit_foto" name="foto" accept="image/*">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_umkm">Nama UMKM</label>
                        <input type="text" class="form-control" id="edit_nama_umkm" name="nama_umkm" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_pemilik">Pemilik</label>
                        <input type="text" class="form-control" id="edit_pemilik" name="pemilik" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_kontak">Nomor WhatsApp (Kontak)</label>
                        <input type="text" class="form-control" id="edit_kontak" name="kontak" placeholder="e.g., +6281234567890" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_alamat">Link Lokasi Google Maps</label>
                        <input type="url" class="form-control" id="edit_alamat" name="alamat" placeholder="Salin link Google Maps di sini (contoh: https://maps.app.goo.gl/...)" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_deskripsi">Deskripsi UMKM</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus UMKM -->
<div class="modal fade" id="hapusUmkmModal" tabindex="-1" role="dialog" aria-labelledby="hapusUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="hapus-umkm-form" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusUmkmModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data UMKM ini? Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabel Data UMKM -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama UMKM</th>
                        <th>Pemilik</th>
                        <th>Kontak</th>
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
                            <td>{{ $umkm->nama_umkm }}</td>
                            <td>{{ $umkm->pemilik }}</td>
                            <td>{{ $umkm->kontak }}</td>
                            <td>
                                <a href="{{ $umkm->alamat }}" target="_blank">Lihat Lokasi</a>
                            </td>
                            <td>{{ $umkm->deskripsi }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm edit-btn"
                                    data-toggle="modal" data-target="#editUmkmModal"
                                    data-id="{{ $umkm->id }}"
                                    data-nama="{{ $umkm->nama_umkm }}"
                                    data-pemilik="{{ $umkm->pemilik }}"
                                    data-kontak="{{ $umkm->kontak }}"
                                    data-alamat="{{ $umkm->alamat }}"
                                    data-deskripsi="{{ $umkm->deskripsi }}">
                                    Edit
                                </button>
                                <!-- Tombol Hapus -->
                                <button type="button" class="btn btn-danger btn-sm delete-btn"
                                    data-toggle="modal" data-target="#hapusUmkmModal"
                                    data-id="{{ $umkm->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data UMKM.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Script untuk Modal Edit
    $('#editUmkmModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var id = button.data('id');
        var nama = button.data('nama_umkm');
        var pemilik = button.data('pemilik');
        var kontak = button.data('kontak');
        var alamat = button.data('alamat');
        var deskripsi = button.data('deskripsi');

        var modal = $(this);
        modal.find('#edit_nama_umkm').val(nama);
        modal.find('#edit_pemilik').val(pemilik);
        modal.find('#edit_kontak').val(kontak);
        modal.find('#edit_alamat').val(alamat);
        modal.find('#edit_deskripsi').val(deskripsi);

        // Mengatur action form untuk submit ke route update yang benar
        var formAction = "/update_umkm/" + id;
        $('#edit-umkm-form').attr('action', formAction);
    });

    // Script untuk Modal Hapus
    $('#hapusUmkmModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var id = button.data('id');

        // Mengatur action form untuk submit ke route hapus yang benar
        var formAction = "/hapus_umkm/" + id;
        $('#hapus-umkm-form').attr('action', formAction);
    });
</script>
@endsection
