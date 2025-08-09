<!-- resources/views/pages/BUMDes/profil_bumdes.blade.php -->
@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">PROFIL BUMDes</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form id="formProfilBUMDes">
                @csrf
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" rows="6" name="deskripsi" disabled></textarea>
                </div>
                <button type="button" class="btn btn-primary" id="btnSimpan" style="display:none;">Simpan</button>
                <button type="button" class="btn btn-warning" id="btnEdit">Edit</button>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('formProfilBUMDes');
        const btnEdit = document.getElementById('btnEdit');
        const btnSimpan = document.getElementById('btnSimpan');
        const textarea = document.getElementById('deskripsi');

        // Fungsi untuk memuat data dari database
        function loadData() {
            fetch('/ambil-profil-bumdes')
                .then(response => response.json())
                .then(data => {
                    if (data && data.deskripsi) {
                        textarea.value = data.deskripsi;
                        textarea.disabled = true;
                        btnEdit.style.display = 'block';
                        btnSimpan.style.display = 'none';
                    } else {
                        textarea.disabled = false;
                        btnEdit.style.display = 'none';
                        btnSimpan.style.display = 'block';
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Fungsi untuk mengaktifkan textarea
        btnEdit.addEventListener('click', function () {
            textarea.disabled = false;
            btnEdit.style.display = 'none';
            btnSimpan.style.display = 'block';
        });

        // Fungsi untuk menyimpan data
        btnSimpan.addEventListener('click', function () {
            const formData = new FormData(form);

            fetch('/simpan-profil-bumdes', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert('Data berhasil disimpan!');
                textarea.disabled = true;
                btnSimpan.style.display = 'none';
                btnEdit.style.display = 'block';
                loadData();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal menyimpan data.');
            });
        });

        loadData();
    });
    </script>
@endsection
