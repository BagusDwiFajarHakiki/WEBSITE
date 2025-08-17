@extends('layout.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">STRUKTUR DESA</h1>
        <div class="d-sm-flex">
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#strukturModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Ganti Struktur
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

    <div class="card shadow mb-4">
        <div class="card-body p-0">
            @if ($struktur)
                <img src="{{ asset('storage/' . $struktur->gambar) }}" alt="Struktur Desa" class="img-fluid w-100">
            @else
                <p class="text-center p-4">Gambar struktur desa belum diunggah.</p>
            @endif
        </div>
    </div>

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
                    <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data">
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
@endsection