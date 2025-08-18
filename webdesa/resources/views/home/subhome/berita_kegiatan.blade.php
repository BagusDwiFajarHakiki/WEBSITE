@php
    use App\Models\Setting;
    use App\Models\gallery;
    
    $setting = Setting::first();
    $logo = $setting ? $setting->logo_path : null;
    $gallery = gallery::latest()->get();
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Pasiraman - Berita Desa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #1e40af;
            --secondary: #3b82f6;
            --accent: #10b981;
            --light: #f0f9ff;
            --dark: #0f172a;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        
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
        
        .tag {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        
        .modal-overlay.active {
            opacity: 1;
            pointer-events: all;
        }
        
        .modal-container {
            background-color: white;
            border-radius: 12px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }
        
        .modal-overlay.active .modal-container {
            transform: translateY(0);
        }
        
        @media (max-width: 768px) {
            .news-card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('home.header', ['logo' => $logo])

    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">BERITA DESA</h1>
                <p class="text-gray-600">Informasi terkini seputar kegiatan dan perkembangan Desa Pasiraman</p>
            </div>
        </div>

        <!-- News Grid -->
        <div x-data="{ openModal: false }">
            @if($gallery->isEmpty())
                <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                    <i class="fas fa-newspaper text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-medium text-gray-600 mb-2">Belum Ada Berita</h3>
                    <p class="text-gray-500">Tidak ada berita yang tersedia saat ini</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($gallery as $item)
                    <div class="news-card bg-white">
                        <div class="overflow-hidden">
                            <img 
                                src="{{ asset('storage/'.$item->gambar) }}" 
                                alt="{{ $item->judul }}"
                                class="news-image w-full"
                            >
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-center mb-2">
                                <span class="tag bg-blue-100 text-blue-800">
                                    {{ $item->created_at->format('d M Y') }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $item->judul }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit(strip_tags($item->isi), 120) }}
                            </p>
                            <a 
                                href="{{ url('/gallery', $item->id) }}"
                                class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center"
                            >
                                Baca selengkapnya
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

           

                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('home.footer')
</body>
</html>