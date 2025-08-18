@extends('layout.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DATA UMKM</h1>
    <div class="d-flex align-items-center">
        <div class="input-group mr-3" style="width: 300px;">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari Nama UMKM atau Pemilik..." aria-label="Cari Nama UMKM atau Pemilik" aria-describedby="searchButton">
        </div>
        <button type="button" class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahUmkmModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </button>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $umkm->links('pagination::bootstrap-4') }}
</div>

<div class="modal fade" id="tambahUmkmModal" tabindex="-1" role="dialog" aria-labelledby="tambahUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('umkm.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUmkmModalLabel">Tambah Data UMKM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
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
                        <label for="alamat">Link Lokasi Google Maps</label>
                        <div class="input-group">
                            <input type="url" class="form-control" id="alamat" name="alamat" placeholder="Salin link Google Maps di sini..." required>
                            <div class="input-group-append">
                                <a href="https://www.google.com/maps" target="_blank" class="btn btn-outline-secondary">
                                    <i class="fas fa-map-marker-alt"></i> Buka Google Maps
                                </a>
                            </div>
                        </div>
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

<div class="modal fade" id="editUmkmModal" tabindex="-1" role="dialog" aria-labelledby="editUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editFormUmkm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUmkmModalLabel">Edit Data UMKM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteUmkmModal" tabindex="-1" role="dialog" aria-labelledby="deleteUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUmkmModalLabel">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
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

<div class="modal fade" id="detailUmkmModal" tabindex="-1" role="dialog" aria-labelledby="detailUmkmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailUmkmModalLabel">Detail UMKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <img id="detail_foto" src="" alt="Foto UMKM" class="img-fluid rounded" style="max-height: 200px;">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama UMKM:</strong> <span id="detail_nama_umkm"></span></li>
                    <li class="list-group-item"><strong>Pemilik:</strong> <span id="detail_pemilik"></span></li>
                    <li class="list-group-item"><strong>Kontak:</strong> <a id="detail_kontak" href="#" target="_blank"></a></li>
                    <li class="list-group-item"><strong>Alamat:</strong> <a id="detail_alamat" href="#" target="_blank">Lihat Lokasi</a></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row" id="umkmCardContainer">
        @forelse($umkm as $data)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input umkm-status-toggle" id="statusSwitch-{{ $data->id }}" data-id="{{ $data->id }}" {{ $data->status ? 'checked' : '' }}>
                                <label class="custom-control-label" for="statusSwitch-{{ $data->id }}"></label>
                            </div>
                            <small class="text-muted">{{ $data->updated_at->format('d M Y') }}</small>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Aksi:</div>
                                    <button class="dropdown-item" data-toggle="modal" data-target="#editUmkmModal"
                                        data-id="{{ $data->id }}"
                                        data-nama="{{ $data->nama_umkm }}"
                                        data-pemilik="{{ $data->pemilik }}"
                                        data-kontak="{{ $data->kontak }}"
                                        data-alamat="{{ $data->alamat }}"
                                        data-foto="{{ $data->foto ? asset('storage/umkm/' . $data->foto) : '' }}">
                                        <i class="fas fa-fw fa-pen text-warning"></i> Edit
                                    </button>
                                    <button class="dropdown-item" data-toggle="modal" data-target="#deleteUmkmModal" data-id="{{ $data->id }}">
                                        <i class="fas fa-fw fa-trash text-danger"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="text-center" data-toggle="modal" data-target="#detailUmkmModal" 
                            data-id="{{ $data->id }}"
                            data-nama="{{ $data->nama_umkm }}"
                            data-pemilik="{{ $data->pemilik }}"
                            data-kontak="{{ $data->kontak }}"
                            data-alamat="{{ $data->alamat }}"
                            data-foto="{{ $data->foto ? asset('storage/umkm/' . $data->foto) : '' }}"
                            style="cursor: pointer;">
                            @if($data->foto)
                                <img src="{{ asset('storage/umkm/' . $data->foto) }}" alt="Foto UMKM" class="img-fluid rounded mb-3" style="width: 100%; height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center rounded mb-3" style="width: 100%; height: 200px;">
                                    <span class="text-muted">Tidak ada foto</span>
                                </div>
                            @endif
                            <h5 class="card-title text-truncate">{{ $data->nama_umkm }}</h5>
                            <p class="card-text text-muted mb-0">Pemilik: {{ $data->pemilik }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Tidak ada data UMKM yang ditemukan.</p>
            </div>
        @endforelse
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57B5h/qf/44j+pE34l7I7fF7K6yA0sA7I" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        // Hapus `xintegrity` dari script tags untuk mencegah error saat dijalankan di beberapa lingkungan
        $('script[xintegrity]').each(function() {
            $(this).removeAttr('xintegrity');
        });

        // Skrip untuk mengisi modal edit
        $('#editUmkmModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var umkm_id = button.data('id');
            var nama_umkm = button.data('nama');
            var pemilik = button.data('pemilik');
            var kontak = button.data('kontak');
            var alamat = button.data('alamat');
            var foto_url = button.data('foto');

            var modal = $(this);
            modal.find('#edit_id').val(umkm_id);
            modal.find('#edit_nama_umkm').val(nama_umkm);
            modal.find('#edit_pemilik').val(pemilik);
            modal.find('#edit_kontak').val(kontak);
            modal.find('#edit_alamat').val(alamat);
            
            var updateUrl = `{{ url('umkm') }}/${umkm_id}`;
            modal.find('#editFormUmkm').attr('action', updateUrl);

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
            var deleteUrl = `{{ url('umkm') }}/${umkm_id}`;
            modal.find('#deleteFormUmkm').attr('action', deleteUrl);
        });

        // Skrip untuk mengisi modal detail
        $('#detailUmkmModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var nama_umkm = button.data('nama');
            var pemilik = button.data('pemilik');
            var kontak = button.data('kontak');
            var alamat = button.data('alamat');
            var foto_url = button.data('foto');

            var modal = $(this);
            modal.find('#detail_nama_umkm').text(nama_umkm);
            modal.find('#detail_pemilik').text(pemilik);

            // Kontak WhatsApp
            var kontak_wa = kontak;
            if (kontak_wa.startsWith('0')) {
                kontak_wa = '62' + kontak_wa.substring(1);
            }
            modal.find('#detail_kontak').text(kontak);
            modal.find('#detail_kontak').attr('href', `https://wa.me/${kontak_wa}`);

            // Alamat
            modal.find('#detail_alamat').attr('href', alamat);

            // Foto
            if (foto_url) {
                modal.find('#detail_foto').attr('src', foto_url);
                modal.find('#detail_foto').show();
            } else {
                modal.find('#detail_foto').hide();
            }
        });

        // Skrip untuk menangani perubahan status UMKM
        // Catatan: Ini memerlukan jQuery dan rute `umkm/update-status` yang benar di backend.
        // Pastikan Anda sudah mengimpor jQuery di bagian atas, seperti yang telah dilakukan.
        // Skrip ini dapat dipertahankan dari kode asli karena fungsinya masih relevan.
        $('.umkm-status-toggle').on('change', function() {
            var umkm_id = $(this).data('id');
            var isChecked = $(this).is(':checked');
            var newStatus = isChecked ? 1 : 0;
            
            $.ajax({
                url: `{{ url('umkm/update-status') }}/${umkm_id}`,
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: newStatus
                },
                success: function(response) {
                    console.log('Status updated successfully:', response);
                },
                error: function(xhr) {
                    console.error('Error updating status:', xhr.responseText);
                    $('#statusSwitch-' + umkm_id).prop('checked', !isChecked);
                }
            });
        });

        // Skrip untuk tombol toggle all status
        // Mengubah logika agar hanya bekerja pada card yang terlihat
        $('#toggleAllStatus').on('click', function() {
            var allCheckboxes = $('.umkm-status-toggle');
            var allChecked = allCheckboxes.length > 0 && allCheckboxes.length === allCheckboxes.filter(':checked').length;
            var newStatus = !allChecked;
            
            allCheckboxes.prop('checked', newStatus);

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
                        $('#statusSwitch-' + umkm_id).prop('checked', !isChecked);
                    }
                });
            });
        });

        // Skrip untuk fitur pencarian
        function filterCards() {
            var searchText = $('#searchInput').val().toLowerCase();
            $('#umkmCardContainer .col-lg-4').each(function() {
                var umkmName = $(this).find('.card-title').text().toLowerCase();
                var pemilikName = $(this).find('.card-text').text().toLowerCase();
                if (umkmName.includes(searchText) || pemilikName.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $('#searchInput').on('keyup', function() {
            filterCards();
        });
    });
</script>

@endsection