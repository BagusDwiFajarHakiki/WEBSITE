@extends('layout.app')

@section('content')
<div class="container">
    <h1>Video Profil</h1>

    {{-- Alert popup error --}}
    @if ($errors->any())
        <script>
            alert("Terjadi kesalahan: {{ $errors->first() }}");
        </script>
    @endif

    {{-- Form Upload Video --}}
    <form action="{{ route('beranda.simpan_video') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="file_path">File Video (mp4, mov, avi, max 20MB)</label>
            <input type="file" class="form-control" name="file_path" accept="video/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
