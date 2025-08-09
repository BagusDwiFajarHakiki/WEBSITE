<!-- resources/views/data-desa.blade.php -->
@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DATA DESA</h1>
    </div>

    <div class="card shadow mb-4">
    <div class="card-body">
        <form id="formProfil">
            @csrf
            <div class="form-group">
                <label for="profil">Profil Desa</label>
                <textarea class="form-control" id="profil" rows="3" name="profil" disabled></textarea>
            </div>
            <div class="form-group">
                <label for="visi">Visi Desa</label>
                <textarea class="form-control" id="visi" rows="3" name="visi" disabled></textarea>
            </div>
            <div class="form-group">
                <label for="misi">Misi Desa</label>
                <textarea class="form-control" id="misi" rows="5" name="misi" disabled></textarea>
            </div>
            <button type="button" class="btn btn-primary" id="btnSimpan" style="display:none;">Simpan</button>
            <button type="button" class="btn btn-warning" id="btnEdit">Edit</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formProfil');
    const btnEdit = document.getElementById('btnEdit');
    const btnSimpan = document.getElementById('btnSimpan');
    const inputs = form.querySelectorAll('textarea');

    // Fungsi untuk memuat data dari database
    function loadData() {
        fetch('/ambil-profil-desa')
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('profil').value = data.profil;
                    document.getElementById('visi').value = data.visi;
                    document.getElementById('misi').value = data.misi;
                    
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

        fetch('/simpan-profil-desa', {
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
});
</script>

@endsection