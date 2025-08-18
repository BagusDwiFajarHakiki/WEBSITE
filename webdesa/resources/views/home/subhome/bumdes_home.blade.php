@php
    use App\Models\Setting;
    use App\Models\Bumdes; // Perbaikan 1: Gunakan model Bumdes yang benar
    
    $setting = Setting::first();
    $logo = $setting ? $setting->logo_path : null;
    $usaha = Bumdes::first(); // Perbaikan 2: Ambil data pertama dari model Bumdes
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @if($logo)
        <link rel="icon" type="image/png" href="{{ asset('storage/logos/' . $logo) }}">
        <meta property="og:image" content="{{ asset('storage/logos/' . $logo) }}">
    @endif
    <title>Desa Pasiraman - BUMDes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        /* Custom scrollbar untuk carousel */
        .carousel-scrollbar::-webkit-scrollbar {
            height: 6px;
        }
        .carousel-scrollbar::-webkit-scrollbar-thumb {
            background-color: #22c55e;
            border-radius: 10px;
        }
        .carousel-scrollbar {
            scroll-behavior: smooth;
        }

        /* Styles untuk mobile menu */
        @media (max-width: 767px) {
            #mobile-menu {
                position: fixed;
                top: 0;
                right: -100%;
                bottom: 0;
                width: 60%;
                max-width: 320px;
                height: 100%;
                overflow-y: auto;
                z-index: 40;
                transition: right 0.3s ease-in-out;
                background-color: white;
                display: flex;
                flex-direction: column;
            }

            #mobile-menu.open {
                right: 0;
            }

            #mobile-menu-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 39;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
            }

            #mobile-menu-overlay.open {
                opacity: 1;
                visibility: visible;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    @include('home.header', ['logo' => $logo])

    <main class="container mx-auto p-4 md:p-8">
        <!-- Perbaikan 3: Hapus form yang tidak perlu -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-2xl font-bold mb-4">BUMDES desa Pasiraman</h1>
            @if($usaha && $usaha->deskripsi)
                <p class="text-gray-700">{{ $usaha->deskripsi }}</p>
            @else
                <p class="text-gray-500">Deskripsi belum tersedia</p>
            @endif
        </div>

        <!-- Perbaikan 4: Gunakan grid Tailwind untuk layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($usaha)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if($usaha->fotopath)
                        <img src="{{ asset('storage/' . $usaha->fotopath) }}" 
                             class="w-full h-48 object-cover" 
                             alt="Foto Usaha">
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                            <span class="text-gray-500">Tidak ada foto</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2">{{ $usaha->name ?? 'Nama Usaha' }}</h2>
                        <p class="text-gray-700">
                            {{ $usaha->deskripsi ? Str::limit($usaha->deskripsi, 100) : 'Deskripsi belum tersedia' }}
                        </p>
                    </div>
                </div>
            @else
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">Data usaha belum tersedia</p>
                </div>
            @endif
        </div>
    </main>

    @include('home.footer')
</body>
</html>