<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Desa Pasiraman - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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
        
        /* CSS untuk video profil */
        #hero-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* Rasio 16:9 untuk desktop */
            overflow: hidden;
        }
        #hero-container iframe,
        #hero-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        @media (max-width: 767px) {
            #hero-container {
                /* Menyesuaikan tinggi wadah dengan tinggi layar mobile */
                padding-bottom: 0;
                height: 100vh;
            }
        }
        
        /* Animasi fade in */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        
    </style>
</head>

<body class="bg-[#E7F0E7] text-gray-900 font-sans">



    <header class="bg-gradient-to-r from-green-600 via-teal-500 to-green-400 p-4 text-white sticky top-0 z-30 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex justify-center items-center shadow-md">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M9 21V12H15V21" />
                    </svg>
                </div>
                <div>
                    <h1 class="font-semibold text-lg select-none">Desa Pasiraman</h1>
                    <p class="text-sm select-none">Kecamatan Wonotirto</p>
                </div>
            </div>

            <button id="mobile-menu-button" class="md:hidden text-white hover:text-gray-200 transition focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <nav id="desktop-menu" class="hidden md:block">
                <ul class="flex space-x-6 text-sm font-semibold">
                    <li><a href="#" class="hover:underline hover:text-gray-200">Beranda</a></li>
                    <li class="relative group">
                        <button
                            aria-haspopup="true"
                            aria-expanded="false"
                            id="profilDropdownButton"
                            class="hover:underline hover:text-gray-200 inline-flex items-center focus:outline-none"
                            >
                            Profil Desa
                            <svg class="ml-1 w-4 h-4 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4.5L14.5 7z"/>
                            </svg>
                        </button>
                        <ul
                            id="profilDropdownMenu"
                            class="absolute left-0 top-full mt-1 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200 text-gray-800 z-50"
                            aria-label="submenu"
                        >
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-100">Visi Misi</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-green-100">Struktur Pemerintahan</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:underline hover:text-gray-200">Layanan</a></li>
                    <li><a href="#" class="hover:underline hover:text-gray-200">Potensi Desa</a></li>
                    <li><a href="#" class="hover:underline hover:text-gray-200">Berita & Kegiatan</a></li>
                    <li><a href="#" class="hover:underline hover:text-gray-200">Galeri</a></li>
                </ul>
            </nav>
        </div>

        <div id="mobile-menu-overlay" class="hidden md:hidden"></div>
        <nav id="mobile-menu" class="hidden md:hidden">
            <div class="flex justify-between items-center p-4">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-white rounded-full flex justify-center items-center shadow-md">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M9 21V12H15V21" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-semibold text-lg text-gray-900 select-none">Desa Pasiraman</h1>
                    </div>
                </div>
                <button id="mobile-menu-close-button" class="text-gray-500 hover:text-gray-700 transition focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

/* Animasi fade in */

            <div class="flex-grow text-gray-800">
                <a href="#" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-50 transition-colors">Beranda</a>
                <div class="relative">
                    <button id="mobile-profil-dropdown-button" class="w-full flex justify-between items-center px-4 py-3 border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <span>Profil Desa</span>
                        <svg class="ml-1 w-4 h-4 fill-current text-gray-700 transform transition-transform duration-200" id="mobile-profil-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 4.5L14.5 7z"/>
                        </svg>
                    </button>
                    <div id="mobile-profil-dropdown-menu" class="ml-4 space-y-1 text-sm hidden">
                        <a href="#" class="block px-4 py-2 border-b border-gray-100 hover:bg-green-100 transition-colors">Visi Misi</a>
                        <a href="#" class="block px-4 py-2 border-b border-gray-100 hover:bg-green-100 transition-colors">Struktur Pemerintahan</a>
                    </div>
                </div>
                <a href="#xx" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-50 transition-colors">Layanan</a>
                <a href="#" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-50 transition-colors">Potensi Desa</a>
                <a href="#" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-50 transition-colors">Berita & Kegiatan</a>
                <a href="#" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-50 transition-colors">Galeri</a>
            </div>
        </nav>
    </header>

    <main>
        
        <section class="relative w-full h-[1080px] overflow-hidden">
            <video autoplay muted loop class="absolute top-0 left-0 w-full h-full object-cover">
                <source src="{{ asset('videos/sony.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-black bg-opacity-30 flex justify-center items-center rounded-b-3xl">
                <h2 class="text-white text-4xl md:text-6xl font-extrabold tracking-widest select-none drop-shadow-lg">
                SELAMAT DATANG
                </h2>
            </div>
        </section>
            
        <section class="max-w-6xl mx-auto p-6 md:p-12 space-y-6 fade-in">
            <h3 class="text-2xl font-bold text-center text-gray-800 select-none">Profil Desa Pasiraman</h3>
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-16">
                <div class="flex-shrink-0 relative w-40 md:w-48">
                    <div class="rounded-xl overflow-hidden shadow-lg border border-gray-200 bg-white">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/023834fe-ef82-47c8-8216-0f6c5b163734.png"
                        alt="Portrait of a village chief wearing white official uniform and cap standing against a minimal background"
                        class="w-full h-auto object-cover" onerror="this.style.display='none'" />
                    </div>
                    <div class="bg-sky-300 text-xs text-white font-semibold py-1 rounded text-center mt-2">
                        Suyudi Hariyana M.Pd.
                    </div>
                    <div class="bg-gray-700 text-xs text-white font-semibold py-1 rounded text-center mt-1">
                        Kepala Desa Pasiraman
                    </div>
                </div>
                <div class="text-gray-900 max-w-3xl relative">
                    <p class="text-sm leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et.
                    </p>
                    <button class="bg-gray-700 text-gray-100 px-5 py-2 rounded-full text-xs hover:bg-gray-600 transition" aria-label="Lihat Selengkapnya Profil Desa">
                        Lihat Selengkapnya --
                    </button>
                </div>
            </div>
        </section>

        <section class="max-w-6xl mx-auto p-6 md:p-12 bg-black bg-opacity-70 text-white rounded-xl shadow-xl space-y-6 fade-in">
            <h4 class="font-bold text-lg select-none">Statistik Umum<br />Desa Pasiraman</h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex flex-col space-y-2 border-b border-gray-500 md:border-b-0 md:border-r md:pr-6">
                    <p class="text-xs uppercase font-semibold opacity-70 select-none">Luas Wilayah</p>
                    <p class="text-xl font-semibold select-text">110.97 Km2</p>
                </div>
                <div class="flex flex-col space-y-2 border-b border-gray-500 md:border-b-0 md:border-r md:pr-6">
                    <p class="text-xs uppercase font-semibold opacity-70 select-none">Jumlah Dusun</p>
                    <p class="text-xl font-semibold select-text">5</p>
                </div>
                <div class="flex flex-col space-y-2 md:pr-6">
                    <p class="text-xs uppercase font-semibold opacity-70 select-none">Jumlah Penduduk</p>
                    <p class="text-xl font-semibold select-text">3,450 Jiwa</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-gray-600">
                <div class="flex flex-col space-y-2 border-b border-gray-500 md:border-b-0 md:border-r md:pr-6">
                    <p class="text-xs uppercase font-semibold opacity-70 select-none">Jumlah RT</p>
                    <p class="text-xl font-semibold select-text">20</p>
                </div>
                <div class="flex flex-col space-y-2 border-b border-gray-500 md:border-b-0 md:border-r md:pr-6">
                    <p class="text-xs uppercase font-semibold opacity-70 select-none">Jumlah RW</p>
                    <p class="text-xl font-semibold select-text">8</p>
                </div>
                <div class="flex flex-col space-y-2 md:pr-6">
                    <p class="text-xs uppercase font-semibold opacity-70 select-none">Mata Pencaharian Utama</p>
                    <p class="text-xl font-semibold select-text">Pertanian</p>
                </div>
            </div>
        </section>

        <section class="max-w-6xl mx-auto p-6 md:p-12 space-y-6 fade-in">
            <h5 class="text-2xl font-bold text-center text-gray-800 select-none">Potensi Desa</h5>

            <section class="max-w-6xl mx-auto p-6 md:p-12 space-y-6 bg-white rounded-xl shadow-md" id="xx">
                <div class="flex justify-between items-center mb-4">
                    <h6 class="text-lg font-semibold select-none">UMKM Desa Pasiraman</h6>
                    <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-4 py-1 rounded-full transition" aria-label="Lihat Semua UMKM Desa Pasiraman">Lihat Semua</button>
                </div>
                <div class="flex overflow-x-auto carousel-scrollbar space-x-4 scrollbar-hide pb-2">
                    <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/7e88bc7c-2c30-4f1e-880d-cdd76781299f.png" alt="Small outdoor food stall selling traditional Indonesian snacks and dishes with a yellow tent in the background" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                        <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">Warung Bu Siti</div>
                    </div>
                    <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-82c2-f340a08210f0.png" alt="Colorful kites hanging on a wooden rack, outdoors with sunny sky, in a traditional kites stall" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                        <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">Layangan Mas Edi</div>
                    </div>
                    <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-815a-151d8c6250bd.png" alt="Young woman at a modern small shop preparing boba milk tea drinks with ingredients and blender visible" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                        <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">Es Boba Mbak Dinda</div>
                    </div>
                    <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-6145-3fa1b981bf46.png" alt="Street vendor grilling sausages over hot coals on a metal rack at a food stall" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                        <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">Sosis Bakar Mas No</div>
                    </div>
                </div>
            </section>

            <section class="max-w-6xl mx-auto p-6 md:p-12 space-y-6 bg-white rounded-xl shadow-md fade-in">
                <div class="flex justify-between items-center mb-4">
                    <h6 class="text-lg font-semibold select-none">BUMdes Desa Pasiraman</h6>
                    <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-4 py-1 rounded-full transition" aria-label="Lihat Semua BUMDes Desa Pasiraman">Lihat Semua</button>
                </div>
                <div class="flex overflow-x-auto carousel-scrollbar space-x-4 scrollbar-hide pb-2">
                    <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0 border border-gray-200">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/f2eca9fa-84b4-461c-89df-134423e9e4f8.png" alt="Small outdoor food stall selling traditional Indonesian snacks and dishes with a yellow tent in the background" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                        <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">Warung Bu Siti</div>
                    </div>
                    <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0 border border-gray-200">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-82c2-f340a08210f0.png" alt="Colorful kites hanging on a wooden rack, outdoors with sunny sky, in a traditional kites stall" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                        <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">Layangan Mas Edi</div>
                    </div>
                    <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0 border border-gray-200">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-815a-151d8c6250bd.png" alt="Young woman at a modern small shop preparing boba milk tea drinks with ingredients and blender visible" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                        <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">Es Boba Mbak Dinda</div>
                    </div>
                    <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0 border border-gray-200">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-6145-3fa1b981bf46.png" alt="Street vendor grilling sausages over hot coals on a metal rack at a food stall" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                        <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">Sosis Bakar Mas No</div>
                    </div>
                </div>
            </section>

            <section class="max-w-6xl mx-auto p-6 md:p-12 space-y-6 bg-white rounded-xl shadow-md fade-in">
                <div class="flex justify-between items-center mb-2">
                    <h5 class="text-lg font-semibold select-none">Galeri Kegiatan Desa</h5>
                    <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-4 py-1 rounded-full transition" aria-label="Lihat Semua Galeri Kegiatan Desa">Lihat Semua</button>
                </div>
                <div class="min-h-[8rem] rounded-lg border border-gray-300 bg-white flex justify-center items-center text-gray-600 italic select-none">
                    Belum ada galeri yang tersedia
                </div>
            </section>
        </section>
    </main>

    <footer class="bg-gray-800 text-gray-300 mt-12 text-sm py-10">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h6 class="font-semibold mb-2 select-none">Kontak</h6>
                <p class="select-text">(0322) 20834702</p>
                <p class="select-text">Email: desaPasiraman@contoh.com</p>
            </div>
            <div>
                <h6 class="font-semibold mb-2 select-none">Balai Desa</h6>
                <p class="select-text">Krajan, Pasiraman, Kec. Wonotirto, Kabupaten Blitar, Jawa Timur 66173</p>
            </div>
            <div>
                <h6 class="font-semibold mb-2 select-none">Media Sosial</h6>
                <div class="flex space-x-3">
                    <a href="#" aria-label="Link ke Instagram Desa Pasiraman" class="hover:text-green-400 transition" title="Instagram Desa Pasiraman">
                        <svg role="img" class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Instagram icon</title><path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 2A3.75 3.75 0 004 7.75v8.5A3.75 3.75 0 007.75 20h8.5a3.75 3.75 0 003.75-3.75v-8.5A3.75 3.75 0 0016.25 4h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 2a3 3 0 100 6 3 3 0 000-6zm4.75-1a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0z"/></svg>
                    </a>
                    <a href="#" aria-label="Link ke Facebook Desa Pasiraman" class="hover:text-green-400 transition" title="Facebook Desa Pasiraman">
                        <svg role="img" class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Facebook icon</title><path d="M22 12a10 10 0 10-11.49 9.87v-6.99h-2.7v-2.88h2.7v-2.2c0-2.67 1.59-4.14 4.03-4.14 1.17 0 2.4.21 2.4.21v2.63h-1.35c-1.33 0-1.74.82-1.74 1.67v2.23h2.97l-.48 2.88h-2.49v6.99A10 10 0 0022 12z"/></svg>
                    </a>
                    <a href="#" aria-label="Link ke Twitter Desa Pasiraman" class="hover:text-green-400 transition" title="Twitter Desa Pasiraman">
                        <svg role="img" class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Twitter icon</title><path d="M22.46 6c-.77.35-1.6.58-2.47.69a4.26 4.26 0 001.9-2.36c-.83.49-1.74.85-2.72 1.04a4.28 4.28 0 00-7.29 3.9 12.13 12.13 0 01-8.81-4.46 4.3 4.3 0 001.33 5.79 4.32 4.32 0 01-1.94-.53v.05a4.28 4.28 0 003.44 4.19c-.41.11-.83.17-1.27.17-.31 0-.62-.03-.91-.09a4.28 4.28 0 003.99 2.97 8.61 8.61 0 01-5.32 1.83c-.35 0-.7-.02-1.04-.06a12.17 12.17 0 006.57 1.93c7.89 0 12.21-6.54 12.21-12.21l-.01-.56A8.72 8.72 0 0024 4.56a8.5 8.5 0 01-2.54.7z"/></svg>
                    </a>
                    <a href="#" aria-label="Link ke WhatsApp Desa Pasiraman" class="hover:text-green-400 transition" title="WhatsApp Desa Pasiraman">
                        <svg role="img" class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>WhatsApp icon</title><path d="M20.52 3.48A11.9 11.9 0 0012 0C5.37 0 0 5.37 0 12a11.94 11.94 0 002.92 7.79L0 24l4.26-2.8A11.9 11.9 0 0012 24c6.63 0 12-5.37 12-12a11.9 11.9 0 00-3.48-8.52zM12 22a9.88 9.88 0 01-5-1.39l-.36-.22-3.2 2.1 1.07-3.45-.24-.35A9.92 9.92 0 012 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.38-7.07c-.3-.15-1.77-.87-2.05-.96s-.48-.15-.68.15-.78.96-.96 1.16-.35.22-.65.07a8.08 8.08 0 01-2.37-1.47 8.91 8.91 0 01-1.66-2.05c-.18-.3 0-.46.13-.61.14-.14.3-.35.45-.53a1.69 1.69 0 00.22-.37.91.91 0 000-.67c-.07-.15-.68-1.66-.93-2.27-.25-.6-.5-.52-.68-.53-.18 0-.39 0-.6 0a1.03 1.03 0 00-.74.36c-.25.26-1 1-1 2.43s1.03 2.81 1.17 3a12 12 0 002.07 3.18 12.56 12.56 0 003.5 3.27c.49.3.87.24 1.2.15a4.68 4.68 0 001.63-1.92 4 4 0 00.28-1.9c-.03-.17-.14-.27-.3-.4z"/></svg>
                    </a>
                    <a href="#" aria-label="Link ke Email Desa Pasiraman" class="hover:text-green-400 transition" title="Email Desa Pasiraman">
                        <svg role="img" class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Email icon</title><path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 2l-8 5-8-5h16zm-16 12V8l7.99 5 8-5v10H4z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-6 text-center text-gray-400 text-xs select-none">
            Hak Cipta - 2025. Pemerintah Desa Pasiraman.
        </div>
    </footer>

    <script>
        // Existing dropdown accessibility toggle for desktop
        const profilButton = document.getElementById('profilDropdownButton');
        const profilMenu = document.getElementById('profilDropdownMenu');

        if (profilButton && profilMenu) {
            profilButton.addEventListener('click', () => {
                const expanded = profilButton.getAttribute('aria-expanded') === 'true';
                profilButton.setAttribute('aria-expanded', String(!expanded));
                if (!expanded) {
                    profilMenu.classList.remove('opacity-0', 'invisible');
                    profilMenu.classList.add('opacity-100', 'visible');
                } else {
                    profilMenu.classList.remove('opacity-100', 'visible');
                    profilMenu.classList.add('opacity-0', 'invisible');
                } 
            });

            document.addEventListener('click', (e) => {
                if (!profilButton.contains(e.target) && !profilMenu.contains(e.target)) {
                    profilButton.setAttribute('aria-expanded', 'false');
                    profilMenu.classList.remove('opacity-100', 'visible');
                    profilMenu.classList.add('opacity-0', 'invisible');
                }
            });
        }

        // New JavaScript for mobile hamburger menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const mobileMenuCloseButton = document.getElementById('mobile-menu-close-button');
        
        // Mobile Profil Dropdown
        const mobileProfilDropdownButton = document.getElementById('mobile-profil-dropdown-button');
        const mobileProfilDropdownMenu = document.getElementById('mobile-profil-dropdown-menu');
        const mobileProfilChevron = document.getElementById('mobile-profil-chevron');

        function toggleMobileMenu() {
            mobileMenu.classList.toggle('open');
            mobileMenuOverlay.classList.toggle('open');
            // document.body.classList.toggle('no-scroll'); // Baris ini telah dihapus
        }

        mobileMenuButton.addEventListener('click', toggleMobileMenu);
        mobileMenuCloseButton.addEventListener('click', toggleMobileMenu);
        mobileMenuOverlay.addEventListener('click', toggleMobileMenu);

        mobileProfilDropdownButton.addEventListener('click', () => {
            mobileProfilDropdownMenu.classList.toggle('hidden');
            mobileProfilChevron.classList.toggle('rotate-180');
        });

        // JavaScript for scroll-triggered animation
        const fadeInElements = document.querySelectorAll('.fade-in');

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.2
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        fadeInElements.forEach(element => {
            observer.observe(element);
        });
    </script>
</body>
</html>