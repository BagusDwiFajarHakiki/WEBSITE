@extends('layout.app')

@section('content')
<div class="container">
    <h1>Upload Video Profil</h1>

    {{-- Alert popup error --}}
    @if ($errors->any())
        <script>
            alert("Terjadi kesalahan: {{ $errors->first() }}");
        </script>
    @endif

    {{-- Alert popup success --}}
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    {{-- Form Upload Video --}}
    <form action="{{ route('beranda.simpan_video') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Judul Video</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="file_path">File Video (mp4, mov, avi, max 20MB)</label>
            <input type="file" class="form-control" name="file_path" accept="video/*" required>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="is_main" value="1">
            <label class="form-check-label" for="is_main">Jadikan utama?</label>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
