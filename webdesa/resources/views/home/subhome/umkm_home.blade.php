@php
    use App\Models\Setting;

    $setting = Setting::first();
    $logo = $setting ? $setting->logo_path : null;
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
    <title>Desa Pasiraman - UMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        .news-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .news-image {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .news-card:hover .news-image {
            transform: scale(1.05);
        }


        /* Custom scrollbar untuk carousel */
        .carousel-scrollbar::-webkit-scrollbar {
            height: 6px;
        }
        .carousel-scrollbar::-webkit-scrollbar-thumb {
            background-color: #22c55e; /* Tailwind Green-500 */
            border-radius: 10px;
        }
        /* Smooth horizontal scroll */
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

<body class="bg-[#E7F0E7] text-gray-900 font-sans">

    @include('home.header', ['logo' => $logo])

    <main class="container mx-auto p-4 md:p-8">

        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h1 class="text-2xl font-bold mb-4">UMKM desa Pasiraman</h1>
            <p class="text-gray-700">lorem ipsum dolor sit amet</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($umkm as $data)
                <div class="news-card bg-white rounded-lg shadow-md overflow-hidden">
                    @if($data->foto)
                        <div class="news-image overflow-hidden">
                        <img src="{{ asset('storage/umkm/' . $data->foto) }}" alt="Foto UMKM {{ $data->nama_umkm }}" class="w-full h-48 object-cover object-center">
                        </div>
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500 text-sm">Tidak ada foto</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-1 truncate">{{ $data->nama_umkm }}</h3>
                        <p class="text-sm text-gray-600">Pemilik: {{ $data->pemilik }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <p class="text-center text-gray-500 text-xl">Tidak ada data UMKM yang ditemukan.</p>
                </div>
            @endforelse
        </div>
    </main>
    
    @include('home.footer')

</body>
</html>