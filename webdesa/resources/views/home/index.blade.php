<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Kota Malang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .program-card:hover {
            transform: scale(1.03);
        }
        
        .gallery-item:hover {
            transform: scale(1.05);
            z-index: 10;
        }
        
        .carousel-item {
            transition: transform 0.5s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-8">
                    <h1 class="text-2xl font-bold text-blue-800">PORTAL<span class="text-blue-600">KOTAMALANG</span></h1>
                    
                    <nav class="hidden lg:flex space-x-6">
                        <a href="#" class="text-blue-800 font-medium hover:text-blue-600 transition">Profil</a>
                        <a href="#" class="text-blue-800 font-medium hover:text-blue-600 transition">Layanan Publik</a>
                        <a href="#" class="text-blue-800 font-medium hover:text-blue-600 transition">Program Strategis</a>
                        <a href="#" class="text-blue-800 font-medium hover:text-blue-600 transition">Media Center</a>
                        <a href="#" class="text-blue-800 font-medium hover:text-blue-600 transition">UMKM</a>
                        <a href="#" class="text-blue-800 font-medium hover:text-blue-600 transition">Kota Kreatif</a>
                        <a href="#" class="text-blue-800 font-medium hover:text-blue-600 transition">PPID</a>
                    </nav>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center bg-gray-100 rounded-full px-3 py-1">
                        <input type="text" placeholder="Cari..." class="bg-transparent border-none focus:outline-none w-32 md:w-40 text-sm">
                        <button class="text-gray-500 hover:text-blue-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    
                    <div class="flex border border-blue-600 rounded-full overflow-hidden">
                        <button class="px-3 py-1 bg-blue-600 text-white text-sm">IND</button>
                        <button class="px-3 py-1 bg-white text-blue-600 text-sm">ENG</button>
                    </div>
                    
                    <button class="lg:hidden text-blue-800">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient text-white">
        <div class="container mx-auto px-4 py-16 md:py-24">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">PORTAL KOTA MALANG</h1>
                <p class="text-xl md:text-2xl mb-8">Pendidikan, Perdagangan dan Jasa, Ekonomi Kreatif, Pariwisata</p>
                <button class="bg-white text-blue-800 px-6 py-3 rounded-full font-medium hover:bg-blue-50 transition">
                    Jelajahi Kota Malang <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- About City Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-800 mb-6">Tentang Kota Malang</h2>
                <p class="text-lg text-gray-700 mb-8">
                    Kota Malang merupakan kota terbesar kedua di Jawa Timur yang dikenal dengan julukan "Kota Pendidikan" 
                    karena memiliki banyak perguruan tinggi ternama. Kota ini juga menjadi pusat perdagangan, jasa, dan 
                    ekonomi kreatif di wilayah Malang Raya. Dengan iklim yang sejuk dan berbagai destinasi wisata menarik, 
                    Malang terus berkembang sebagai kota modern yang mempertahankan nilai-nilai budaya dan kearifan lokal.
                </p>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Data Statistik Kota Malang</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Stat Card 1 -->
                <div class="stat-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="text-blue-600 mb-3">
                        <i class="fas fa-map-marked-alt text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Luas Wilayah</h3>
                    <p class="text-2xl font-bold">110,06 km²</p>
                </div>
                
                <!-- Stat Card 2 -->
                <div class="stat-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="text-blue-600 mb-3">
                        <i class="fas fa-map-pin text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Jumlah Kecamatan</h3>
                    <p class="text-2xl font-bold">5 Kecamatan</p>
                </div>
                
                <!-- Stat Card 3 -->
                <div class="stat-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="text-blue-600 mb-3">
                        <i class="fas fa-users text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Jumlah Penduduk 2024</h3>
                    <p class="text-2xl font-bold">895.387 Jiwa</p>
                </div>
                
                <!-- Stat Card 4 -->
                <div class="stat-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="text-blue-600 mb-3">
                        <i class="fas fa-chart-line text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Pertumbuhan Ekonomi 2024</h3>
                    <p class="text-2xl font-bold">5,72%</p>
                </div>
                
                <!-- Stat Card 5 -->
                <div class="stat-card bg-white p-6 rounded-xl shadow-md transition duration-300">
                    <div class="text-blue-600 mb-3">
                        <i class="fas fa-graduation-cap text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">IPM 2024</h3>
                    <p class="text-2xl font-bold">86,32</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News Carousel Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-blue-800">Berita Utama</h2>
                <a href="#" class="text-blue-600 font-medium hover:underline">Lihat Semua Berita <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            
            <div class="relative overflow-hidden">
                <div class="flex carousel-item transition-transform duration-300">
                    <!-- News Item 1 -->
                    <div class="news-card w-full md:w-1/2 lg:w-1/3 px-4 mb-8 transition duration-300">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md h-full">
                            <div class="relative pb-2/3 h-48 overflow-hidden">
                                <img src="https://source.unsplash.com/random/600x400/?city,government" alt="News Image" class="absolute h-full w-full object-cover">
                                <div class="absolute bottom-0 left-0 bg-blue-600 text-white px-3 py-1 text-sm font-medium">25 Agustus 2024</div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-blue-800 mb-2">Pemkot Malang Raih Penghargaan Kota Terinovatif 2024</h3>
                                <p class="text-gray-600 mb-4">Pemerintah Kota Malang menerima penghargaan sebagai Kota Terinovatif 2024 dari Kementerian Dalam Negeri...</p>
                                <a href="#" class="text-blue-600 font-medium hover:underline">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- News Item 2 -->
                    <div class="news-card w-full md:w-1/2 lg:w-1/3 px-4 mb-8 transition duration-300">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md h-full">
                            <div class="relative pb-2/3 h-48 overflow-hidden">
                                <img src="https://source.unsplash.com/random/600x400/?education" alt="News Image" class="absolute h-full w-full object-cover">
                                <div class="absolute bottom-0 left-0 bg-blue-600 text-white px-3 py-1 text-sm font-medium">18 Agustus 2024</div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-blue-800 mb-2">Program Beasiswa Pendidikan Kota Malang Diperluas</h3>
                                <p class="text-gray-600 mb-4">Pemerintah Kota Malang menambah kuota penerima beasiswa pendidikan untuk siswa berprestasi dari keluarga kurang mampu...</p>
                                <a href="#" class="text-blue-600 font-medium hover:underline">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- News Item 3 -->
                    <div class="news-card w-full md:w-1/2 lg:w-1/3 px-4 mb-8 transition duration-300">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md h-full">
                            <div class="relative pb-2/3 h-48 overflow-hidden">
                                <img src="https://source.unsplash.com/random/600x400/?tourism" alt="News Image" class="absolute h-full w-full object-cover">
                                <div class="absolute bottom-0 left-0 bg-blue-600 text-white px-3 py-1 text-sm font-medium">12 Agustus 2024</div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-blue-800 mb-2">Kunjungan Wisatawan ke Malang Meningkat 30%</h3>
                                <p class="text-gray-600 mb-4">Dinas Pariwisata Kota Malang mencatat kenaikan signifikan jumlah wisatawan domestik dan mancanegara selama libur sekolah...</p>
                                <a href="#" class="text-blue-600 font-medium hover:underline">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full shadow-md p-3 ml-2 text-blue-800 hover:bg-blue-50">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full shadow-md p-3 mr-2 text-blue-800 hover:bg-blue-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Program Strategis Kota Malang</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Program 1 -->
                <div class="program-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300">
                    <div class="h-40 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-5xl text-blue-600"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Pengendalian Inflasi</h3>
                        <p class="text-gray-600 mb-4">Program stabilisasi harga bahan pokok melalui pasar murah dan pengawasan ketat.</p>
                        <a href="#" class="text-blue-600 font-medium hover:underline">Detail Program</a>
                    </div>
                </div>
                
                <!-- Program 2 -->
                <div class="program-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300">
                    <div class="h-40 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-5xl text-blue-600"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Pengentasan Kemiskinan</h3>
                        <p class="text-gray-600 mb-4">Pemberdayaan masyarakat melalui pelatihan kerja dan bantuan modal UMKM.</p>
                        <a href="#" class="text-blue-600 font-medium hover:underline">Detail Program</a>
                    </div>
                </div>
                
                <!-- Program 3 -->
                <div class="program-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300">
                    <div class="h-40 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-child text-5xl text-blue-600"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Pencegahan Stunting</h3>
                        <p class="text-gray-600 mb-4">Intervensi gizi dan edukasi pola asuh untuk balita di daerah rawan stunting.</p>
                        <a href="#" class="text-blue-600 font-medium hover:underline">Detail Program</a>
                    </div>
                </div>
                
                <!-- Program 4 -->
                <div class="program-card bg-white rounded-xl overflow-hidden shadow-md transition duration-300">
                    <div class="h-40 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-paint-brush text-5xl text-blue-600"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Ekonomi Kreatif</h3>
                        <p class="text-gray-600 mb-4">Pengembangan potensi ekonomi kreatif melalui inkubasi bisnis dan pemasaran.</p>
                        <a href="#" class="text-blue-600 font-medium hover:underline">Detail Program</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-blue-800">Galeri Kota Malang</h2>
                <a href="#" class="text-blue-600 font-medium hover:underline">Lihat Semua Galeri <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="gallery-item overflow-hidden rounded-lg shadow-md transition duration-300">
                    <img src="https://source.unsplash.com/random/300x200/?malang,city" alt="Gallery Image" class="w-full h-40 object-cover">
                </div>
                <div class="gallery-item overflow-hidden rounded-lg shadow-md transition duration-300">
                    <img src="https://source.unsplash.com/random/300x200/?malang,tourism" alt="Gallery Image" class="w-full h-40 object-cover">
                </div>
                <div class="gallery-item overflow-hidden rounded-lg shadow-md transition duration-300">
                    <img src="https://source.unsplash.com/random/300x200/?malang,government" alt="Gallery Image" class="w-full h-40 object-cover">
                </div>
                <div class="gallery-item overflow-hidden rounded-lg shadow-md transition duration-300">
                    <img src="https://source.unsplash.com/random/300x200/?malang,culture" alt="Gallery Image" class="w-full h-40 object-cover">
                </div>
                <div class="gallery-item overflow-hidden rounded-lg shadow-md transition duration-300">
                    <img src="https://source.unsplash.com/random/300x200/?malang,education" alt="Gallery Image" class="w-full h-40 object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Video Terkini</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-xl overflow-hidden shadow-md">
                    <div class="relative pb-[56.25%] bg-gray-200">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-800 mb-2">Pembangunan Infrastruktur Kota Malang 2024</h3>
                        <p class="text-gray-600">Progres pembangunan jalan dan fasilitas umum di berbagai wilayah Kota Malang.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl overflow-hidden shadow-md">
                    <div class="relative pb-[56.25%] bg-gray-200">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-800 mb-2">Festival Budaya Malang 2024</h3>
                        <p class="text-gray-600">Highlight acara tahunan Festival Budaya Malang yang menampilkan kekayaan seni dan budaya lokal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UMKM Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-blue-800">Produk UMKM Kota Malang</h2>
                <a href="#" class="text-blue-600 font-medium hover:underline">Lihat Semua Produk <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- UMKM Product 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="h-48 bg-gray-100 flex items-center justify-center p-4">
                        <img src="https://source.unsplash.com/random/300x300/?handicraft" alt="UMKM Product" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-blue-800 mb-1">Kerajinan Kayu Jati</h3>
                        <p class="text-sm text-gray-600 mb-2">Oleh: UKM Karya Jati Malang</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-blue-600">Rp 150.000</span>
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- UMKM Product 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="h-48 bg-gray-100 flex items-center justify-center p-4">
                        <img src="https://source.unsplash.com/random/300x300/?food" alt="UMKM Product" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-blue-800 mb-1">Oleh-Oleh Khas Malang</h3>
                        <p class="text-sm text-gray-600 mb-2">Oleh: UMKM Rasa Malang</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-blue-600">Rp 75.000</span>
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- UMKM Product 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="h-48 bg-gray-100 flex items-center justify-center p-4">
                        <img src="https://source.unsplash.com/random/300x300/?textile" alt="UMKM Product" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-blue-800 mb-1">Batik Malangan</h3>
                        <p class="text-sm text-gray-600 mb-2">Oleh: Batik Kencana Wungu</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-blue-600">Rp 250.000</span>
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- UMKM Product 4 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="h-48 bg-gray-100 flex items-center justify-center p-4">
                        <img src="https://source.unsplash.com/random/300x300/?coffee" alt="UMKM Product" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-blue-800 mb-1">Kopi Arabika Malang</h3>
                        <p class="text-sm text-gray-600 mb-2">Oleh: Kopi Gunung Kawi</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-blue-600">Rp 95.000</span>
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak Kami</h3>
                    <div class="space-y-3">
                        <p class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>Jl. Tugu No.1, Klojen, Kota Malang, Jawa Timur 65111</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>info@malangkota.go.id</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-phone-alt mr-3"></i>
                            <span>(0341) 551312</span>
                        </p>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Profil Kota</a></li>
                        <li><a href="#" class="hover:underline">Struktur Organisasi</a></li>
                        <li><a href="#" class="hover:underline">Peraturan Daerah</a></li>
                        <li><a href="#" class="hover:underline">Pengumuman Lelang</a></li>
                        <li><a href="#" class="hover:underline">Layanan Publik</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-4">Layanan Online</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">SIMDA</a></li>
                        <li><a href="#" class="hover:underline">SIPKD</a></li>
                        <li><a href="#" class="hover:underline">E-Planning</a></li>
                        <li><a href="#" class="hover:underline">E-Budgeting</a></li>
                        <li><a href="#" class="hover:underline">E-Procurement</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-4">Media Sosial</h3>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-700 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                    <p>Berlangganan newsletter:</p>
                    <div class="flex mt-2">
                        <input type="email" placeholder="Email Anda" class="bg-blue-800 text-white px-3 py-2 rounded-l focus:outline-none w-full">
                        <button class="bg-blue-600 hover:bg-blue-500 px-4 rounded-r">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-blue-800 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p>© 2024 Pemerintah Kota Malang. Seluruh hak cipta dilindungi.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="hover:underline">Kebijakan Privasi</a>
                        <a href="#" class="hover:underline">Syarat & Ketentuan</a>
                        <a href="#" class="hover:underline">Peta Situs</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Simple carousel functionality
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.carousel-item');
            const items = document.querySelectorAll('.news-card');
            const itemWidth = items[0].offsetWidth;
            const prevBtn = document.querySelector('button:nth-of-type(1)');
            const nextBtn = document.querySelector('button:nth-of-type(2)');
            let position = 0;
            const maxPosition = -(itemWidth * (items.length - 3));
            
            nextBtn.addEventListener('click', function() {
                if (position > maxPosition) {
                    position -= itemWidth;
                    carousel.style.transform = `translateX(${position}px)`;
                }
            });
            
            prevBtn.addEventListener('click', function() {
                if (position < 0) {
                    position += itemWidth;
                    carousel.style.transform = `translateX(${position}px)`;
                }
            });
            
            // Mobile menu toggle (would need implementation)
            const mobileMenuBtn = document.querySelector('.lg\\:hidden');
            // Add mobile menu functionality here
        });
    </script>
</body>
</html>