@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">VIDEO PROFIL</h1>
        <button type="button" class="btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#chooseTypeModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
        </button>
    </div>

    <!-- Modal Pilih Jenis Data -->
    <div class="modal fade" id="chooseTypeModal" tabindex="-1" aria-labelledby="chooseTypeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="chooseTypeModalLabel">Pilih Jenis Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-grid gap-2">
                <button class="btn btn-outline-primary" onclick="openFormModal('video')">Tambah Video</button>
                <button class="btn btn-outline-success" onclick="openFormModal('foto')">Tambah Foto</button>
                <button class="btn btn-outline-warning" onclick="openFormModal('slogan')">Tambah Slogan</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Form Video -->
    <div class="modal fade" id="formVideoModal" tabindex="-1" aria-labelledby="formVideoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="/simpan_video" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="formVideoModalLabel">Tambah Video Profil</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="video" class="form-label">Upload Video Profil</label>
                <input type="file" class="form-control" id="video" name="video" accept="video/*" required>
              </div>
              <div class="mb-3">
                <label for="name_video" class="form-label">Nama Video</label>
                <input type="text" class="form-control" id="name_video" name="name" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Simpan Video</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Form Foto -->
    <div class="modal fade" id="formFotoModal" tabindex="-1" aria-labelledby="formFotoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="/simpan_foto" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="formFotoModalLabel">Tambah Foto Profil</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto Profil</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
              </div>
              <div class="mb-3">
                <label for="name_foto" class="form-label">Nama Foto</label>
                <input type="text" class="form-control" id="name_foto" name="name" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Simpan Foto</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Form Slogan -->
    <div class="modal fade" id="formSloganModal" tabindex="-1" aria-labelledby="formSloganModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="/simpan_slogan" method="POST">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="formSloganModalLabel">Tambah Slogan Desa Pasiraman</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="slogan" class="form-label">Slogan Desa Pasiraman</label>
                <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Masukkan slogan" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Simpan Slogan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Container Data Video -->
    <!-- ... (data video, foto, slogan tetap seperti sebelumnya) ... -->

    <script>
        function openFormModal(type) {
            // Tutup modal pilihan
            var chooseModal = bootstrap.Modal.getInstance(document.getElementById('chooseTypeModal'));
            chooseModal.hide();

            // Buka modal form sesuai tipe
            if(type === 'video') {
                var modal = new bootstrap.Modal(document.getElementById('formVideoModal'));
                modal.show();
            } else if(type === 'foto') {
                var modal = new bootstrap.Modal(document.getElementById('formFotoModal'));
                modal.show();
            } else if(type === 'slogan') {
                var modal = new bootstrap.Modal(document.getElementById('formSloganModal'));
                modal.show();
            }
        }

        function limitCheck(type, limit) {
            let checks = document.querySelectorAll('.' + type + '-check');
            let checked = Array.from(checks).filter(c => c.checked);
            if(checked.length > limit) {
                alert('Maksimal ' + limit + ' ' + type + ' yang dapat ditampilkan di menu utama.');
                checked[checked.length - 1].checked = false;
            }
        }
    </script>
@endsection