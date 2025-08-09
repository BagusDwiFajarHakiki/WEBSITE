@extends('layout.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Video Profil</h1>

        <!-- Tombol Ganti Video -->
        <button type="button" class="btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#gantiVideoModal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Ganti Video
        </button>

    </div>

    {{-- Tampilkan video kalau ada --}}
    @if(isset($video) && $video->file_path)
        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <video controls autoplay muted style="position: absolute; top:0; left:0; width:100%; height:100%;">
                <source src="{{ asset('storage/'.$video->file_path) }}" type="video/mp4">
            </video>

    @else
        <p>Belum ada video.</p>
    @endif

    <br><br>

    <!-- Modal Ganti Video -->
    <div class="modal fade" id="gantiVideoModal" tabindex="-1" role="dialog" aria-labelledby="gantiVideoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiVideoModalLabel">Ganti Video Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{-- Alert popup error --}}
                    @if ($errors->any())
                        <script>
                            alert("Terjadi kesalahan: {{ $errors->first() }}");
                        </script>
                    @endif

                    {{-- Form Upload Video --}}
                    <form action="{{ route('beranda.simpan_video') }}" method="POST" enctype="multipart/form-data" id="videoForm">
                        @csrf
                        <div class="form-group">
                            <label for="file_path">File Video (mp4, mov, avi, max 20MB)</label>
                            <input type="file" class="form-control" name="file_path" id="file_path" accept="video/*" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>

                    <script>
                    document.getElementById('videoForm').addEventListener('submit', function(e) {
                        let fileInput = document.getElementById('file_path');
                        let file = fileInput.files[0];
                        if (file && file.size > 20 * 1024 * 1024) { // 20 MB
                            e.preventDefault();
                            alert("Ukuran file maksimal 20MB. File yang dipilih: " + (file.size / 1024 / 1024).toFixed(2) + " MB");
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>

@endsection