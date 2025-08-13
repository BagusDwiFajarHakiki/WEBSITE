@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Berita</h1>
    <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $item->judul }}" required>
        </div>

        <div class="form-group">
            <label for="gambar">Upload Gambar (Kosongkan jika tidak ingin mengubah)</label>
            <input type="file" name="gambar" id="gambar" class="form-control-file" accept="image/*">
        </div>

        <div class="form-group">
            <label for="isi">Isi Berita</label>
            <textarea name="isi" id="isi" rows="6" class="form-control" required>{{ $item->isi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection