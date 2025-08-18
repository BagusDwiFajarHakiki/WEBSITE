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
    <title>Desa Pasiraman - Berita & Kegiatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
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
        
        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 10;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .news-image {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .news-card:hover .news-image {
            transform: scale(1.05);
        }
        
        .date-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            border-radius: 2px;
        }
        
        .filter-btn {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background: #3b82f6;
            color: white;
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

    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 text-white mb-12">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Berita & Kegiatan Desa</h1>
                <p class="text-lg text-blue-100 mb-6">
                    Ikuti perkembangan terkini dan kegiatan yang sedang berlangsung di Desa Pasiraman
                </p>
                <div class="relative max-w-xl mx-auto">
                    <input type="text" placeholder="Cari berita atau kegiatan..." class="w-full py-3 px-6 rounded-full bg-white bg-opacity-20 backdrop-blur-sm text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-white">
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-white text-blue-600 w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Filter Section -->
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <button class="filter-btn active">Semua</button>
            <button class="filter-btn">Berita</button>
            <button class="filter-btn">Pengumuman</button>
            <button class="filter-btn">Kegiatan</button>
            <button class="filter-btn">Acara</button>
        </div>
        
        <!-- Featured News -->
        <div class="mb-16">
            <h2 class="section-title text-2xl font-bold text-gray-800">Berita Terbaru</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="news-card bg-white overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?q=80&w=1932" alt="Featured News" class="w-full h-80 object-cover news-image">
                        <span class="category-badge bg-blue-500 text-white">Berita</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <span class="date-badge mr-3"><i class="far fa-calendar mr-2"></i> 15 Juli 2023</span>
                            <span class="text-gray-500"><i class="far fa-user mr-1"></i> Admin Desa</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Pembangunan Jalan Desa Selesai, Akses Transportasi Semakin Lancar</h3>
                        <p class="text-gray-600 mb-4">
                            Setelah menunggu selama 3 bulan, akhirnya pembangunan jalan desa sepanjang 2 km telah selesai. Warga masyarakat kini bisa menikmati akses transportasi yang lebih baik...
                        </p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800 transition flex items-center">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="news-card bg-white">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070" alt="News" class="w-full h-48 object-cover news-image">
                            <span class="category-badge bg-green-500 text-white">Kegiatan</span>
                        </div>
                        <div class="p-5">
                            <div class="date-badge mb-3"><i class="far fa-calendar mr-2"></i> 12 Juli 2023</div>
                            <h3 class="font-bold mb-2">Pelatihan Kewirausahaan untuk Pemuda Desa</h3>
                            <p class="text-gray-600 text-sm mb-3">
                                Pelatihan ini diikuti oleh 50 pemuda desa untuk meningkatkan keterampilan wirausaha...
                            </p>
                            <a href="#" class="text-blue-600 text-sm font-medium">Baca Selengkapnya</a>
                        </div>
                    </div>
                    
                    <div class="news-card bg-white">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=2070" alt="News" class="w-full h-48 object-cover news-image">
                            <span class="category-badge bg-amber-500 text-white">Pengumuman</span>
                        </div>
                        <div class="p-5">
                            <div class="date-badge mb-3"><i class="far fa-calendar mr-2"></i> 10 Juli 2023</div>
                            <h3 class="font-bold mb-2">Pendaftaran Bantuan UMKM Tahap II Dibuka</h3>
                            <p class="text-gray-600 text-sm mb-3">
                                Bagi pelaku UMKM di Desa Pasiraman, pendaftaran bantuan tahap II dibuka mulai 10-25 Juli...
                            </p>
                            <a href="#" class="text-blue-600 text-sm font-medium">Baca Selengkapnya</a>
                        </div>
                    </div>
                    
                    <div class="news-card bg-white">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=2070" alt="News" class="w-full h-48 object-cover news-image">
                            <span class="category-badge bg-purple-500 text-white">Acara</span>
                        </div>
                        <div class="p-5">
                            <div class="date-badge mb-3"><i class="far fa-calendar mr-2"></i> 8 Juli 2023</div>
                            <h3 class="font-bold mb-2">Festival Budaya Desa Pasiraman 2023</h3>
                            <p class="text-gray-600 text-sm mb-3">
                                Akan diselenggarakan pada 20-22 Agustus 2023 dengan berbagai pertunjukan budaya...
                            </p>
                            <a href="#" class="text-blue-600 text-sm font-medium">Baca Selengkapnya</a>
                        </div>
                    </div>
                    
                    <div class="news-card bg-white">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1460518451285-97b6aa326961?q=80&w=2070" alt="News" class="w-full h-48 object-cover news-image">
                            <span class="category-badge bg-red-500 text-white">Berita</span>
                        </div>
                        <div class="p-5">
                            <div class="date-badge mb-3"><i class="far fa-calendar mr-2"></i> 5 Juli 2023</div>
                            <h3 class="font-bold mb-2">Desa Pasiraman Raih Penghargaan Desa Terbersih</h3>
                            <p class="text-gray-600 text-sm mb-3">
                                Atas partisipasi warga dalam menjaga kebersihan lingkungan, desa kita meraih penghargaan...
                            </p>
                            <a href="#" class="text-blue-600 text-sm font-medium">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- All News Section -->
        <div class="mb-16">
            <div class="flex justify-between items-center mb-8">
                <h2 class="section-title text-2xl font-bold text-gray-800">Semua Berita & Kegiatan</h2>
                <div class="flex items-center">
                    <span class="mr-3 text-gray-600">Urutkan:</span>
                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Terbaru</option>
                        <option>Terlama</option>
                        <option>Populer</option>
                    </select>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($pengumuman) && count($pengumuman) > 0)
                    @foreach($pengumuman as $item)
                        <div class="news-card bg-white">
                            <div class="relative">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                                        class="w-full h-48 object-cover news-image" 
                                        alt="{{ $item->judul }}">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <i class="far fa-newspaper text-4xl text-gray-400"></i>
                                    </div>
                                @endif
                                <span class="category-badge bg-blue-500 text-white">Berita</span>
                            </div>
                            <div class="p-6">
                                <div class="date-badge mb-3"><i class="far fa-calendar mr-2"></i> {{ $item->created_at->format('d M Y') }}</div>
                                <h3 class="text-lg font-bold mb-3">{{ $item->judul }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($item->isi, 100) }}</p>
                                <a href="#" class="text-blue-600 font-medium hover:text-blue-800 transition flex items-center">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 text-center py-12">
                        <div class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                            <i class="far fa-newspaper text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Berita</h3>
                        <p class="text-gray-600 max-w-md mx-auto">
                            Saat ini belum ada berita atau kegiatan yang tersedia. Silakan kembali lagi nanti.
                        </p>
                    </div>
                @endif
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <nav class="inline-flex">
                    <a href="#" class="py-2 px-4 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="py-2 px-4 bg-blue-500 text-white border border-blue-500">1</a>
                    <a href="#" class="py-2 px-4 bg-white border border-gray-300 hover:bg-gray-100">2</a>
                    <a href="#" class="py-2 px-4 bg-white border border-gray-300 hover:bg-gray-100">3</a>
                    <a href="#" class="py-2 px-4 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
        
        <!-- Newsletter Section -->
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl p-8 text-white mb-16">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl font-bold mb-4">Dapatkan Update Terbaru</h2>
                <p class="text-green-100 mb-6">
                    Berlangganan newsletter kami untuk mendapatkan informasi terbaru tentang kegiatan dan berita Desa Pasiraman
                </p>
                <div class="flex flex-col sm:flex-row gap-3 max-w-xl mx-auto">
                    <input type="email" placeholder="Email Anda" class="flex-grow py-3 px-6 rounded-full bg-white bg-opacity-20 backdrop-blur-sm text-white placeholder-green-200 focus:outline-none focus:ring-2 focus:ring-white">
                    <button class="bg-white text-green-600 px-6 py-3 rounded-full font-medium hover:bg-green-50 transition whitespace-nowrap">
                        Berlangganan
                    </button>
                </div>
            </div>
        </div>
    </main>

    @include('home.footer')

    <script>
        // Add active class to filter buttons
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>