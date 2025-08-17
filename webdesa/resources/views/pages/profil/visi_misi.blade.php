@extends('layout.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Visi & Misi Desa</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form id="formVisiMisi">
                @csrf
                <div class="form-group">
                    <label for="visi">Visi Desa</label>
                    <textarea class="form-control" id="visi" rows="5" name="visi" disabled></textarea>
                </div>
                <div class="form-group">
                    <label for="misi">Misi Desa</label>
                    <textarea class="form-control" id="misi" rows="8" name="misi" disabled></textarea>
                </div>
                <button type="button" class="btn btn-primary" id="btnSimpanVisiMisi" style="display:none;">Simpan</button>
                <button type="button" class="btn btn-warning" id="btnEditVisiMisi">Edit</button>
            </form>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formVisiMisi');
    const btnEdit = document.getElementById('btnEditVisiMisi');
    const btnSimpan = document.getElementById('btnSimpanVisiMisi');
    const inputs = form.querySelectorAll('textarea');

    // Fungsi untuk memuat data visi dan misi dari database
    function loadVisiMisi() {
        fetch('/ambil-visi-misi')
            .then(response => response.json())
            .then(data => {
                document.getElementById('visi').value = data.visi;
                document.getElementById('misi').value = data.misi;

                if (data.visi || data.misi) {
                    inputs.forEach(input => input.disabled = true);
                    btnEdit.style.display = 'block';
                    btnSimpan.style.display = 'none';
                } else {
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
        const formData = new FormData(form);

        fetch('/simpan-visi-misi', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert('Data visi dan misi berhasil disimpan!');
            inputs.forEach(input => input.disabled = true);
            btnSimpan.style.display = 'none';
            btnEdit.style.display = 'block';
            loadVisiMisi();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal menyimpan data visi dan misi.');
        });
    });

    // Panggil fungsi loadVisiMisi saat halaman pertama kali dimuat
    loadVisiMisi();
});
</script>

@endsection