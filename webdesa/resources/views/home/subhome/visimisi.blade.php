@php
    use App\Models\Setting;
    use App\Models\Profil;
    
    $setting = Setting::first();
    $logo = $setting ? $setting->logo_path : null;
    $profil = Profil::first(); // Get profile data directly in view
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
    <title>Desa Pasiraman - Visi Misi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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

<body class="bg-[#E7F0E7] text-gray-900 font-sans">
    @include('home.header', ['logo' => $logo])

    <main class="container mx-auto p-4 md:p-8">
        <section>
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Visi & Misi Desa</h1>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700">Visi Desa</h2>
                    <div class="bg-gray-100 rounded-lg p-4 mt-2 border border-gray-200">
                        <p class="text-gray-800">{{ $profil->visi ?? 'Belum ada data visi' }}</p>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Misi Desa</h2>
                    <div class="bg-gray-100 rounded-lg p-4 mt-2 border border-gray-200">
                        <p class="text-gray-800" style="white-space: pre-line">{{ $profil->misi ?? 'Belum ada data misi' }}</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('home.footer')
</body>
</html>