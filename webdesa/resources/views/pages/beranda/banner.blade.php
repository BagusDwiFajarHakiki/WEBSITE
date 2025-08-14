@extends('layout.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">BANNER UTAMA</h1>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahBannerModal">
            + Tambah Banner
        </button>
    </div>

    <div class="row">
        @if(isset($banner) && count($banner) > 0)
            @foreach($banner as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" 
                                class="card-img-top" 
                                alt="Gambar Banner" 
                                style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <p class="card-text">{{ Str::limit($item->isi, 100) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div class="form-check form-switch me-3">
                                <input class="form-check-input banner-status-toggle" 
                                        type="checkbox" 
                                        role="switch" 
                                        id="statusToggle{{ $item->id }}" 
                                        data-id="{{ $item->id }}"
                                        @if($item->status == 1) checked @endif>
                                <label class="form-check-label" for="statusToggle{{ $item->id }}">Aktif</label>
                            </div>
                            <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                            <div class="d-flex align-items-center">
                                <div>
                                    <button class="btn btn-warning btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editBannerModal{{ $item->id }}">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#hapusBannerModal{{ $item->id }}">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk Edit, sekarang hanya untuk gambar -->
                <div class="modal fade" id="editBannerModal{{ $item->id }}" tabindex="-1" aria-labelledby="editBannerLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBannerLabel{{ $item->id }}">Edit Banner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update_banner', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar</label>
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
                
                <!-- Modal untuk Hapus -->
                <div class="modal fade" id="hapusBannerModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusBannerLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="hapusBannerLabel{{ $item->id }}">Hapus Banner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                Yakin ingin menghapus banner ini ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="{{ route('hapus_banner', $item->id) }}" method="POST" style="display:inline;">
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
                <p class="text-center text-muted">Belum ada banner</p>
            </div>
        @endif
    </div>

    <!-- Modal untuk Tambah Banner -->
    <div class="modal fade" id="tambahBannerModal" tabindex="-1" aria-labelledby="tambahBannerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBannerLabel">Buat Banner Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('simpan_banner') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form id="formHeading">
                @csrf
                <div class="form-group">
                    <label for="h1">Judul</label>
                    <textarea class="form-control" id="h1" rows="1" name="h1" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="h2">Sub Judul</label>
                    <textarea class="form-control" id="h2" rows="1" name="h2" disabled></textarea>
                </div>
                <button type="button" class="btn btn-primary" id="btnSimpan" style="display:none;">Simpan</button>
                <button type="button" class="btn btn-warning" id="btnEdit">Edit</button>
            </form>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formHeading');
    const btnEdit = document.getElementById('btnEdit');
    const btnSimpan = document.getElementById('btnSimpan');
    const inputs = form.querySelectorAll('textarea');

    // Fungsi untuk memuat data dari database
    function loadData() {
        fetch('/ambil-text')
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('h1').value = data.h1;
                    document.getElementById('h2').value = data.h2;
                    
                    // Form tetap disabled karena sudah ada data
                    inputs.forEach(input => input.disabled = true);
                    btnEdit.style.display = 'block';
                    btnSimpan.style.display = 'none';
                } else {
                    // Form enabled untuk pengisian pertama kali
                    inputs.forEach(input => input.disabled = false);
                    btnEdit.style.display = 'none';
                    btnSimpan.style.display = 'block';
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Fungsi untuk mengaktifkan form
    btnEdit.addEventListener('click', function () {
        inputs.forEach(input => input.disabled = false);
        btnEdit.style.display = 'none';
        btnSimpan.style.display = 'block';
    });

    // Fungsi untuk menyimpan data
    btnSimpan.addEventListener('click', function () {
        // Ambil data dari form
        const formData = new FormData(form);

        fetch('/simpan-text', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert('Data berhasil disimpan!');
            // Setelah berhasil, nonaktifkan form dan muat ulang data
            inputs.forEach(input => input.disabled = true);
            btnSimpan.style.display = 'none';
            btnEdit.style.display = 'block';
            loadData(); // Muat data terbaru dari database
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal menyimpan data.');
        });
    });

    // Panggil fungsi loadData saat halaman pertama kali dimuat
    loadData();

    // Fungsionalitas baru untuk sakelar status banner
        document.querySelectorAll('.banner-status-toggle').forEach(toggle => {
            toggle.addEventListener('change', function() {
                const bannerId = this.getAttribute('data-id');
                const newStatus = this.checked ? 1 : 0;
                
                // Mengirim permintaan AJAX untuk memperbarui status
                fetch(`/banner/update-status/${bannerId}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    // Tampilkan notifikasi atau pesan sukses
                    alert(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Tampilkan notifikasi atau pesan error
                    alert('Gagal memperbarui status banner.');
                    // Jika gagal, kembalikan sakelar ke posisi semula
                    this.checked = !this.checked;
                });
            });
        });
});
</script>

@endsection