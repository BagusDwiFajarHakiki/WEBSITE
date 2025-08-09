@extends('layout.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">PERANGKAT DESA</h1>
        <div class="d-sm-flex">
            <!-- Tombol untuk memicu Modal Unggah Gambar -->
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mr-2" data-toggle="modal" data-target="#strukturModal">
                <i class="fas fa-upload fa-sm text-white-50"></i> Unggah Struktur Desa
            </button>
            <!-- Tombol untuk memicu Modal Input Data Perangkat -->
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#perangkatModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Perangkat Desa
            </button>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Tampilan Gambar Struktur Desa -->
    @if ($struktur)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Struktur Desa</h6>
            </div>
            <div class="card-body p-0">
                <img src="{{ asset('storage/' . $struktur->gambar) }}" alt="Struktur Desa" class="img-fluid w-100">
            </div>
        </div>
    @endif

    <!-- Tampilan Tabel Perangkat Desa -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Perangkat Desa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perangkats as $perangkat)
                            <tr>
                                <td><img src="{{ asset('storage/' . $perangkat->foto) }}" alt="{{ $perangkat->nama }}"
                                        width="50"></td>
                                <td>{{ $perangkat->nama }}</td>
                                <td>{{ $perangkat->jabatan }}</td>
                                <td>{{ $perangkat->kontak }}</td>
                                <td>{{ $perangkat->alamat }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{ $perangkat->id }}">Edit</button>
                                    
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('perangkat.destroy', $perangkat->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $perangkat->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editModalLabel{{ $perangkat->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $perangkat->id }}">Edit
                                                Perangkat Desa</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('perangkat.update', $perangkat->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('POST') {{-- Tambahkan method PUT untuk update --}}
                                                <div class="form-group">
                                                    <label for="edit_foto_{{ $perangkat->id }}">Foto</label>
                                                    <input type="file" class="form-control-file"
                                                        id="edit_foto_{{ $perangkat->id }}" name="foto">
                                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin
                                                        mengganti
                                                        foto.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_nama_{{ $perangkat->id }}">Nama</label>
                                                    <input type="text" class="form-control"
                                                        id="edit_nama_{{ $perangkat->id }}" name="nama"
                                                        value="{{ $perangkat->nama }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_jabatan_{{ $perangkat->id }}">Jabatan</label>
                                                    <input type="text" class="form-control"
                                                        id="edit_jabatan_{{ $perangkat->id }}" name="jabatan"
                                                        value="{{ $perangkat->jabatan }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_kontak_{{ $perangkat->id }}">Kontak</label>
                                                    <input type="text" class="form-control"
                                                        id="edit_kontak_{{ $perangkat->id }}" name="kontak"
                                                        value="{{ $perangkat->kontak }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_alamat_{{ $perangkat->id }}">Alamat</label>
                                                    <textarea class="form-control" id="edit_alamat_{{ $perangkat->id }}" name="alamat" rows="3">{{ $perangkat->alamat }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal Unggah Gambar Struktur Desa -->
    <div class="modal fade" id="strukturModal" tabindex="-1" role="dialog" aria-labelledby="strukturModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="strukturModalLabel">Input Gambar Struktur Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('perangkat.struktur.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Pilih Gambar Struktur Desa (hanya 1 gambar)</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Unggah Gambar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Input Data Perangkat Desa -->
    <div class="modal fade" id="perangkatModal" tabindex="-1" role="dialog" aria-labelledby="perangkatModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="perangkatModalLabel">Input Data Perangkat Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('perangkat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
