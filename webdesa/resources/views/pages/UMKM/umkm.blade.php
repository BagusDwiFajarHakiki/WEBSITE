@extends('layout.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DATA UMKM</h1>
    <!-- Bagian Pencarian dan Tombol Tambah Data -->
    <div class="d-flex align-items-center">
        <!-- Kolom Pencarian dengan lebar yang lebih pendek -->
        <div class="input-group mr-3" style="width: 300px;">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari Nama UMKM atau Pemilik..." aria-label="Cari Nama UMKM atau Pemilik" aria-describedby="searchButton">
        </div>
        <!-- Tombol Tambah Data -->
        <button type="button" class="btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#tambahUmkmModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </button>
    </div>
</div>

<!-- Modal Tambah UMKM -->
<div class="modal fade" id="tambahUmkmModal" tabindex="-1" role="dialog" aria-labelledby="tambahUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('umkm.store')}}" method="POST" enctype="multipart/form-data">
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
                        <label for="nama_umkm">Nama UMKM</label>
                        <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" required>
                    </div>
                    <div class="form-group">
                        <label for="pemilik">Pemilik</label>
                        <input type="text" class="form-control" id="pemilik" name="pemilik" required>
                    </div>
                    <div class="form-group">
                        <label for="kontak">Nomor WhatsApp (Kontak)</label>
                        <input type="number" class="form-control" id="kontak" name="kontak" placeholder="e.g., +6281234567890" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_alamat">Link Lokasi Google Maps</label>
                        <div class="input-group">
                            <input type="url" class="form-control" id="edit_alamat" name="alamat" placeholder="Salin link Google Maps di sini..." required>
                            <div class="input-group-append">
                                <a href="https://www.google.com/maps" target="_blank" class="btn btn-outline-secondary">
                                    <i class="fas fa-map-marker-alt"></i> Buka Google Maps
                                </a>
                            </div>
                        </div>
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
        <form id="editFormUmkm" method="POST" enctype="multipart/form-data">
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
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_foto">Foto UMKM (Kosongkan jika tidak ingin diubah)</label>
                        <input type="file" class="form-control" id="edit_foto" name="foto" accept="image/*">
                        <div class="mt-2" id="current_foto_container">
                            <span class="text-muted">Foto saat ini:</span>
                            <img id="current_foto" src="" alt="Foto UMKM" width="100">
                        </div>
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
                        <input type="number" class="form-control" id="edit_kontak" name="kontak" placeholder="e.g., +6281234567890" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_alamat">Link Lokasi Google Maps</label>
                        <div class="input-group">
                            <input type="url" class="form-control" id="edit_alamat" name="alamat" placeholder="Salin link Google Maps di sini..." required>
                            <div class="input-group-append">
                                <a href="https://www.google.com/maps" target="_blank" class="btn btn-outline-secondary">
                                    <i class="fas fa-map-marker-alt"></i> Buka Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_deskripsi">Deskripsi UMKM</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus UMKM -->
<div class="modal fade" id="deleteUmkmModal" tabindex="-1" role="dialog" aria-labelledby="deleteUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUmkmModalLabel">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data UMKM ini? Tindakan ini tidak dapat diurungkan.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteFormUmkm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Data UMKM -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed;">
                <thead style="text-align: center;">
                    <tr>
                        <th style="width: 4.5%;">
                            <div class="d-flex justify-content-center">
                                <button id="toggleAllStatus" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-check-square"></i>
                                </button>
                            </div>
                        </th>
                        <th style="width: 4%;">No</th>
                        <th style="width: 10%;">Foto</th>
                        <th style="width: 18%;">Nama UMKM</th>
                        <th style="width: 11%;">Pemilik</th>
                        <th style="width: 15%;">Kontak</th>
                        <th style="width: 10%;">Alamat</th>
                        <th style="width: 17.5%;">Deskripsi</th>
                        <th style="width: 9%;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="umkmTableBody">
                    @forelse($umkm as $umkm)
                        <tr>
                            <td style="text-align: center; align-content: center;">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input umkm-status-toggle" id="statusSwitch-{{ $umkm->id }}" data-id="{{ $umkm->id }}" {{ $umkm->status ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="statusSwitch-{{ $umkm->id }}"></label>
                                </div>
                            </td>
                            <td style="align-content: center; text-align: center;">{{ $loop->iteration }}</td>
                            <td>
                                @if($umkm->foto)
                                <img src="{{ asset('storage/umkm/' . $umkm->foto) }}" alt="Foto UMKM" width="90">
                                @else
                                <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td style="word-break: break-word; align-content: center;">{{ $umkm->nama_umkm }}</td>
                            <td style="word-break: break-word; align-content: center;">{{ $umkm->pemilik }}</td>
                            <td style="word-break: break-word; align-content: center;">
                                @php
                                  $kontak_wa = $umkm->kontak;
                                  // Cek apakah nomor kontak dimulai dengan '0'
                                  if (substr($kontak_wa, 0, 1) === '0') {
                                    // Jika ya, ganti '0' di depan dengan '62' (kode negara Indonesia)
                                    $kontak_wa = '62' . substr($kontak_wa, 1);
                                  }
                                @endphp
                                <a href="https://wa.me/{{ $kontak_wa }}" target="_blank">
                                  {{ $umkm->kontak }}
                                </a>
                            </td>
                            <td style="text-align: center; align-content: center;">
                                <a href="{{ $umkm->alamat }}" target="_blank" style="word-break: break-word;">Lihat Lokasi</a>
                            </td>
                            <td style="word-break: break-word; align-content: center;">{{ $umkm->deskripsi }}</td>
                            <td style="text-align: center; align-content: center;">
                                <div class="d-flex justify-content-center" style="gap: 5px;">
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUmkmModal"
                                        data-id="{{ $umkm->id }}"
                                        data-nama="{{ $umkm->nama_umkm }}"
                                        data-pemilik="{{ $umkm->pemilik }}"
                                        data-kontak="{{ $umkm->kontak }}"
                                        data-alamat="{{ $umkm->alamat }}"
                                        data-deskripsi="{{ $umkm->deskripsi }}"
                                        data-foto="{{ $umkm->foto ? asset('storage/umkm/' . $umkm->foto) : '' }}">
                                        <i class="fas fa-fw fa-pen"></i>
                                    </button>
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUmkmModal"
                                        data-id="{{ $umkm->id }}">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </button>
                                </div>
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

<!-- Load jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" xintegrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" xintegrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" xintegrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57B5h/qf/44j+pE34l7I7fF7K6yA0sA7I" crossorigin="anonymous"></script>

<script>
    // Skrip untuk mengisi modal edit
    $('#editUmkmModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var umkm_id = button.data('id');
        var nama_umkm = button.data('nama');
        var pemilik = button.data('pemilik');
        var kontak = button.data('kontak');
        var alamat = button.data('alamat');
        var deskripsi = button.data('deskripsi');
        var foto_url = button.data('foto');

        var modal = $(this);
        modal.find('#edit_id').val(umkm_id);
        modal.find('#edit_nama_umkm').val(nama_umkm);
        modal.find('#edit_pemilik').val(pemilik);
        modal.find('#edit_kontak').val(kontak);
        modal.find('#edit_alamat').val(alamat);
        modal.find('#edit_deskripsi').val(deskripsi);
        
        // Atur action form
        var updateUrl = `{{ url('umkm') }}/${umkm_id}`;
        modal.find('#editFormUmkm').attr('action', updateUrl);

        // Tampilkan foto saat ini jika ada
        if (foto_url) {
            modal.find('#current_foto').attr('src', foto_url);
            modal.find('#current_foto_container').show();
        } else {
            modal.find('#current_foto_container').hide();
        }
    });

    // Skrip untuk mengisi modal hapus
    $('#deleteUmkmModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var umkm_id = button.data('id');
        
        var modal = $(this);
        // Atur action form hapus
        var deleteUrl = `{{ url('umkm') }}/${umkm_id}`;
        modal.find('#deleteFormUmkm').attr('action', deleteUrl);
    });

    // Skrip untuk menangani perubahan status UMKM
    $(document).ready(function() {
        // Hapus `xintegrity` dari script tags untuk mencegah error saat dijalankan di beberapa lingkungan
        $('script[xintegrity]').each(function() {
            $(this).removeAttr('xintegrity');
        });
        
        $('.umkm-status-toggle').on('change', function() {
            var umkm_id = $(this).data('id');
            var isChecked = $(this).is(':checked');
            var newStatus = isChecked ? 1 : 0;
            
            // Lakukan permintaan AJAX
            $.ajax({
                url: `{{ url('umkm/update-status') }}/${umkm_id}`,
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: newStatus
                },
                success: function(response) {
                    console.log('Status updated successfully:', response);
                    // Anda bisa menambahkan notifikasi sukses di sini
                },
                error: function(xhr) {
                    console.error('Error updating status:', xhr.responseText);
                    // Jika ada error, kembalikan status checkbox ke kondisi semula
                    $('#statusSwitch-' + umkm_id).prop('checked', !isChecked);
                    // Anda bisa menambahkan notifikasi error di sini
                }
            });
        });

        // Skrip baru untuk tombol toggle all status
        $('#toggleAllStatus').on('click', function() {
            var allCheckboxes = $('.umkm-status-toggle');
            var allChecked = allCheckboxes.length > 0 && allCheckboxes.length === allCheckboxes.filter(':checked').length;
            var newStatus = !allChecked;

            // Mengubah status semua checkbox
            allCheckboxes.prop('checked', newStatus);

            // Mengirim permintaan AJAX untuk setiap checkbox yang berubah
            allCheckboxes.each(function() {
                var umkm_id = $(this).data('id');
                var isChecked = $(this).is(':checked');
                var newStatusValue = isChecked ? 1 : 0;
                
                $.ajax({
                    url: `{{ url('umkm/update-status') }}/${umkm_id}`,
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: newStatusValue
                    },
                    success: function(response) {
                        console.log('Status updated successfully for ID ' + umkm_id);
                    },
                    error: function(xhr) {
                        console.error('Error updating status for ID ' + umkm_id + ':', xhr.responseText);
                        // Jika gagal, kembalikan status checkbox yang bersangkutan
                        $('#statusSwitch-' + umkm_id).prop('checked', !isChecked);
                    }
                });
            });

            // Mengubah ikon tombol
            if (newStatus) {
                $(this).html('<i class="fas fa-check-square"></i>'); // Ikon untuk 'batalkan semua'
            } else {
                $(this).html('<i class="fas fa-check-square"></i>'); // Ikon untuk 'pilih semua'
            }
        });

        // Skrip baru untuk fitur pencarian
        function filterTable() {
            var searchText = $('#searchInput').val().toLowerCase();
            $('#umkmTableBody tr').each(function() {
                var umkmName = $(this).find('td:eq(3)').text().toLowerCase();
                var pemilikName = $(this).find('td:eq(4)').text().toLowerCase(); // Ambil nama pemilik dari kolom ke-4
                if (umkmName.includes(searchText) || pemilikName.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $('#searchInput').on('keyup', function() {
            filterTable();
        });

        $('#searchButton').on('click', function() {
            filterTable();
        });
    });
</script>

@endsection
