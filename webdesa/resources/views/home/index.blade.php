@php
    use App\Models\Setting;
    $setting = Setting::first();
    $logo = $setting ? $setting->logo_path : null;

    $kepalaDesa = \App\Models\kades::latest()->first();
    $banners = \App\Models\banners::latest()->take(3)->where('status', 1)->get();
    $textBanner = \App\Models\text_banners::latest()->first();
    $sejarah = \App\Models\profil::latest()->first();
    $statistik = \App\Models\statistikDesa::latest()->first();
    $umkm = \App\Models\umkm::latest()->take(6)->where('status', 1)->get();
    $bumdes = \App\Models\listBumdes::latest()->get();
    $galeri = \App\Models\gallery::latest()->get();
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

        /* Modal styling */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0.3s, opacity 0.3s;
        }
        .modal.open {
            visibility: visible;
            opacity: 1;
        }
        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border-radius: 8px;
            max-width: 90%;
            max-height: 90%;
            overflow-y: auto;
            position: relative;
            transform: scale(0.95);
            transition: transform 0.3s ease-out;
        }
        .modal.open .modal-content {
            transform: scale(1);
        }
    </style>
</head>

<body class="bg-[#E7F0E7] text-gray-900 font-sans">

    @include('home.header', ['logo' => $logo])

    <main>
        
        <section class="relative w-full h-[750px] md:h-[800px] overflow-hidden">
            @if(isset($video) && $video->file_path)
                <video autoplay muted loop class="absolute top-0 left-0 w-full h-full object-cover">
                    <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                    Browser Anda tidak mendukung video.
                </video>
            @else
                <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-gray-200">
                    <span class="text-gray-700 text-lg">Belum ada video.</span>
                </div>
            @endif
            <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col justify-end justify-center items-center">
                @if($banners->count())
                    <div class="flex gap-10 justify-center items-center">
                        @foreach($banners as $banner)
                            @if($banner->gambar)
                                <img src="{{ asset('storage/' . $banner->gambar) }}" alt="Banner Desa" class="max-h-40 md:max-h-64 w-auto rounded-lg object-contain" />
                            @endif
                        @endforeach
                    </div>
                @endif
                
                @if($textBanner)
                    <div class="text-center text-white p-6">
                        <br><br>
                        <h1 class="text-4xl md:text-6xl font-extrabold tracking-widest select-none drop-shadow-lg">
                            {{ $textBanner->h1 }}
                        </h1>
                        <h2 class="text-2xl md:text-3xl font-semibold mt-2 select-none drop-shadow-lg">
                            {{ $textBanner->h2 }}
                        </h2>
                    </div>
                @endif
            </div>
        </section>

        <br>

        <section class="max-w-7xl mx-auto p-12 md:p-12 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-16 items-start">
                {{-- Bagian Teks Profil Desa dan Statistik --}}
                <div class="md:col-span-2 text-gray-900 max-w-3xl relative">
                    <h4 class="font-bold text-blue-500 select-none md:text-left">Tentang Kami</h4>
                    <h3 class="text-2xl font-bold text-gray-800 select-none">Profil Desa Pasiraman</h3>
                    <br>
                    <p class="text-sm leading-relaxed mb-6 text-justify">
                        @if($sejarah && $sejarah->profil)
                            {!! $sejarah->profil !!}
                        @else
                            <span class="italic">Belum ada profil desa yang tersedia.</span>
                        @endif
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        @if($statistik)
                        {{-- Kotak Luas Wilayah --}}
                        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 flex flex-col items-center justify-center text-center h-full">
                            <h5 class="text-2xl font-bold text-blue-500">{{ $statistik->luas_wilayah ?? 'N/A' }} <span class="text-2xl">km²</span></h5>
                            <p class="text-xs uppercase font-semibold text-gray-500 mt-1">Luas Wilayah</p>
                        </div>
                        {{-- Kotak Jumlah Dusun --}}
                        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 flex flex-col items-center justify-center text-center h-full">
                            <h5 class="text-2xl font-bold text-green-500">{{ $statistik->jumlah_dusun ?? 'N/A' }}</h5>
                            <p class="text-xs uppercase font-semibold text-gray-500 mt-1">Jumlah Dusun</p>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Kotak Kepala Desa di sisi kanan --}}
                <div class="md:col-span-1 flex flex-col items-center bg-white rounded-xl shadow-lg p-6 border border-gray-200 h-[100%] md:h-[100%]">
                    @if($kepalaDesa && $kepalaDesa->gambar)
                        <div class="w-40 h-40 rounded-full overflow-hidden mb-4 border-2 border-white shadow-md">
                            <img src="{{ asset('storage/kepala-desa/' . $kepalaDesa->gambar) }}" alt="{{ $kepalaDesa->nama }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-40 h-40 rounded-full bg-blue-600 flex items-center justify-center text-white text-5xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.125h15.002c.398 0 .762-.26.929-.605l3.715-8.88a2.25 2.25 0 00-.522-2.815m-15.002 0h6.825a2.25 2.25 0 002.15-1.588l-1.432-4.297a2.25 2.25 0 00-.522-2.815" />
                            </svg>
                        </div>
                    @endif
                    <h4 class="font-semibold text-lg text-center">{{ $kepalaDesa->jabatan ?? 'Kepala Desa' }}</h4>
                    <p class="font-semibold text-center text-blue-700 text-sm mt-1">{{ $kepalaDesa->nama ?? 'Tidak Ada Data' }}</p>
                    
                    <div class="mt-4 border-t border-gray-200 pt-4 w-full">
                        <h5 class="font-semibold text-sm text-center">Visi Desa</h5>
                        <p class="text-center text-gray-700 text-xs mt-2 italic">
                            @if($sejarah && $sejarah->visi)
                                "{{ $sejarah->visi }}"
                            @else
                                "Visi desa belum tersedia."
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-6xl mx-auto p-6 md:p-12 space-y-6 bg-white rounded-xl shadow-md" id="xx">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-semibold select-none">UMKM Desa Pasiraman</h6>
                <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-4 py-1 rounded-full transition" aria-label="Lihat Semua UMKM Desa Pasiraman">Lihat Semua</button>
            </div>
            <div class="flex overflow-x-auto carousel-scrollbar space-x-4 scrollbar-hide pb-2">
                @if($umkm->count())
                    @foreach($umkm as $item)
                        <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0 cursor-pointer"
                            onclick="openUmkmModal({{ json_encode($item) }})">
                            <img src="{{ asset('storage/umkm/' . $item->foto) }}" alt="{{ $item->nama_umkm }}" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                            <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">{{ $item->nama_umkm }}</div>
                        </div>
                    @endforeach
                @else
                    <div class="min-w-full rounded-lg border border-gray-300 bg-white flex justify-center items-center text-gray-600 italic select-none h-48">
                        Belum ada data UMKM yang tersedia.
                    </div>
                @endif
            </div>
        </section>

        <section class="max-w-6xl mx-auto p-6 md:p-12 space-y-6 bg-white rounded-xl shadow-md fade-in">
            <div class="flex justify-between items-center mb-4">
                <h6 class="text-lg font-semibold select-none">BUMdes Desa Pasiraman</h6>
                <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-4 py-1 rounded-full transition" aria-label="Lihat Semua BUMDes Desa Pasiraman">Lihat Semua</button>
            </div>
            <div class="flex overflow-x-auto carousel-scrollbar space-x-4 scrollbar-hide pb-2">
                @if($bumdes->count())
                    @foreach($bumdes as $item)
                        <div class="min-w-[180px] bg-white rounded-xl shadow-md shrink-0 cursor-pointer"
                            onclick="openBumdesModal({{ json_encode($item) }})">
                            <img src="{{ asset('storage/' . $item->fotopath) }}" alt="{{ $item->name }}" class="rounded-t-xl w-full h-36 object-cover" onerror="this.style.display='none'" />
                            <div class="p-3 text-center text-gray-900 font-semibold text-sm select-none">{{ $item->name }}</div>
                        </div>
                    @endforeach
                @else
                    <div class="min-w-full rounded-lg border border-gray-300 bg-white flex justify-center items-center text-gray-600 italic select-none h-48">
                        Belum ada data BUMDes yang tersedia.
                    </div>
                @endif
            </div>
        </section>

        <section class="max-w-6xl mx-auto p-6 md:p-12 space-y-6 bg-white rounded-xl shadow-md fade-in">
            <div class="flex justify-between items-center mb-2">
                <h5 class="text-lg font-semibold select-none">Galeri Kegiatan Desa</h5>
                <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-4 py-1 rounded-full transition" aria-label="Lihat Semua Galeri Kegiatan Desa">Lihat Semua</button>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @if($galeri->count())
                    @foreach($galeri as $item)
                        <div class="relative group rounded-lg overflow-hidden cursor-pointer" onclick="openGaleriModal({{ json_encode($item) }})">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-36 object-cover transition-transform duration-300 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-white text-center text-sm font-medium p-2">{{ $item->judul }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-full rounded-lg border border-gray-300 bg-white flex justify-center items-center text-gray-600 italic select-none h-48">
                        Belum ada galeri yang tersedia.
                    </div>
                @endif
            </div>
        </section>
        
        <section class="max-w-6xl mx-auto p-6 md:p-12 bg-black bg-opacity-70 text-white rounded-xl shadow-xl space-y-6 fade-in">
            <h4 class="font-bold text-lg select-none">Statistik Umum<br />Desa Pasiraman</h4>
            @if($statistik)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex flex-col space-y-2 border-b border-gray-500 md:border-b-0 md:border-r md:pr-6">
                        <p class="text-xs uppercase font-semibold opacity-70 select-none">Luas Wilayah</p>
                        <h5 class="text-2xl font-bold">{{ $statistik->luas_wilayah }} km²</h5>
                    </div>
                    <div class="flex flex-col space-y-2 border-b border-gray-500 md:border-b-0 md:border-r md:pr-6">
                        <p class="text-xs uppercase font-semibold opacity-70 select-none">Jumlah Dusun</p>
                        <h5 class="text-2xl font-bold">{{ $statistik->jumlah_dusun }}</h5>
                    </div>
                    <div class="flex flex-col space-y-2 md:pr-6">
                        <p class="text-xs uppercase font-semibold opacity-70 select-none">Jumlah Penduduk</p>
                        <h5 class="text-2xl font-bold">{{ $statistik->jumlah_penduduk }}</h5>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-gray-600">
                    <div class="flex flex-col space-y-2 border-b border-gray-500 md:border-b-0 md:border-r md:pr-6">
                        <p class="text-xs uppercase font-semibold opacity-70 select-none">Jumlah RT</p>
                        <h5 class="text-2xl font-bold">{{ $statistik->jumlah_rt }}</h5>
                    </div>
                    <div class="flex flex-col space-y-2 border-b border-gray-500 md:border-b-0 md:border-r md:pr-6">
                        <p class="text-xs uppercase font-semibold opacity-70 select-none">Jumlah RW</p>
                        <h5 class="text-2xl font-bold">{{ $statistik->jumlah_rw }}</h5>
                    </div>
                    <div class="flex flex-col space-y-2 md:pr-6">
                        <p class="text-xs uppercase font-semibold opacity-70 select-none">Mata Pencaharian Utama</p>
                        <h5 class="text-2xl font-bold">{{ $statistik->mata_pencaharian_utama }}</h5>
                    </div>
                </div>
            @endif
        </section>

    </main>

    @include('home.footer')

    <div id="umkm-modal" class="modal">
        <div class="modal-content relative bg-white rounded-xl shadow-lg p-6 w-full md:w-3/4 lg:w-1/2">
            <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-3xl font-bold" onclick="closeUmkmModal()" aria-label="Close modal">×</button>
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0 w-full md:w-1/2">
                    <img id="modal-umkm-foto" src="" alt="" class="rounded-xl w-full h-auto object-cover border border-gray-200" />
                </div>
                <div class="flex-grow space-y-4">
                    <h3 id="modal-umkm-nama" class="text-2xl font-bold text-gray-900"></h3>
                    
                    <div class="grid grid-cols-[max-content_1fr] gap-x-2 text-sm text-gray-700">
                        <p><strong>Pemilik:</strong></p>
                        <p><span id="modal-umkm-pemilik"></span></p>

                        <p><strong>Kontak:</strong></p>
                        <p><a id="modal-umkm-kontak" href="#" target="_blank" class="text-blue-600 hover:underline"></a></p>

                        <p><strong>Alamat:</strong></p>
                        <p><a id="modal-umkm-alamat" href="#" target="_blank" class="text-blue-600 hover:underline">Lihat Lokasi</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="bumdes-modal" class="modal">
        <div class="modal-content relative bg-white rounded-xl shadow-lg p-6 w-full md:w-3/4 lg:w-1/2">
            <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-3xl font-bold" onclick="closeBumdesModal()" aria-label="Close modal">×</button>
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0 w-full md:w-1/2">
                    <img id="modal-bumdes-foto" src="" alt="" class="rounded-xl w-full h-auto object-cover border border-gray-200" />
                </div>
                <div class="flex-grow space-y-4">
                    <h3 id="modal-bumdes-nama" class="text-2xl font-bold text-gray-900"></h3>
                    <div class="space-y-2 text-sm text-gray-700">
                        <p class="leading-relaxed"><strong>Deskripsi:</strong><br><span id="modal-bumdes-deskripsi" class="text-justify"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="galeri-modal" class="modal">
        <div class="modal-content relative bg-white rounded-xl shadow-lg p-6 w-full md:w-3/4 lg:w-1/2">
            <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-3xl font-bold" onclick="closeGaleriModal()" aria-label="Close modal">×</button>
            <div class="flex flex-col gap-4">
                <h3 id="modal-galeri-judul" class="text-2xl font-bold text-gray-900 text-center md:text-left"></h3>
                <img id="modal-galeri-gambar" src="" alt="" class="rounded-xl w-full h-auto object-cover border border-gray-200" />
                <div class="space-y-2 text-sm text-gray-700">
                    <p class="leading-relaxed"><strong>Deskripsi:</strong><br><span id="modal-galeri-isi" class="text-justify mt-1 block"></span></p>
                </div>
            </div>
        </div>
    </div>

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

        // UMKM Modal Functionality
        const umkmModal = document.getElementById('umkm-modal');
        const modalUmkmFoto = document.getElementById('modal-umkm-foto');
        const modalUmkmNama = document.getElementById('modal-umkm-nama');
        const modalUmkmPemilik = document.getElementById('modal-umkm-pemilik');
        const modalUmkmKontak = document.getElementById('modal-umkm-kontak');
        const modalUmkmAlamat = document.getElementById('modal-umkm-alamat');

        function formatPhoneNumber(phone) {
            let formatted = phone.replace(/\D/g, '');
            if (formatted.startsWith('0')) {
                formatted = '62' + formatted.substring(1);
            }
            return formatted;
        }

        function openUmkmModal(data) {
            modalUmkmFoto.src = `/storage/umkm/${data.foto}`;
            modalUmkmFoto.alt = data.nama_umkm;
            modalUmkmNama.textContent = data.nama_umkm;
            modalUmkmPemilik.textContent = data.pemilik;
            
            const formattedPhone = formatPhoneNumber(data.kontak);
            modalUmkmKontak.href = `https://wa.me/${formattedPhone}`;
            modalUmkmKontak.textContent = data.kontak;
            
            const encodedAddress = encodeURIComponent(data.alamat);
            modalUmkmAlamat.href = `https://www.google.com/maps/search/?api=1&query=$${encodedAddress}`;
            modalUmkmAlamat.textContent = 'Lihat Lokasi';

            umkmModal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeUmkmModal() {
            umkmModal.classList.remove('open');
            document.body.style.overflow = 'auto';
        }

        umkmModal.addEventListener('click', (e) => {
            if (e.target.id === 'umkm-modal') {
                closeUmkmModal();
            }
        });

        // BUMdes Modal Functionality
        const bumdesModal = document.getElementById('bumdes-modal');
        const modalBumdesFoto = document.getElementById('modal-bumdes-foto');
        const modalBumdesNama = document.getElementById('modal-bumdes-nama');
        const modalBumdesDeskripsi = document.getElementById('modal-bumdes-deskripsi');

        function openBumdesModal(data) {
            modalBumdesFoto.src = `/storage/${data.fotopath}`;
            modalBumdesFoto.alt = data.name;
            modalBumdesNama.textContent = data.name;
            modalBumdesDeskripsi.textContent = data.deskripsi;
            
            bumdesModal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeBumdesModal() {
            bumdesModal.classList.remove('open');
            document.body.style.overflow = 'auto';
        }

        bumdesModal.addEventListener('click', (e) => {
            if (e.target.id === 'bumdes-modal') {
                closeBumdesModal();
            }
        });

        // Galeri Modal Functionality
        const galeriModal = document.getElementById('galeri-modal');
        const modalGaleriJudul = document.getElementById('modal-galeri-judul');
        const modalGaleriGambar = document.getElementById('modal-galeri-gambar');
        const modalGaleriIsi = document.getElementById('modal-galeri-isi');

        function openGaleriModal(data) {
            modalGaleriJudul.textContent = data.judul;
            modalGaleriGambar.src = `/storage/${data.gambar}`;
            modalGaleriGambar.alt = data.judul;
            modalGaleriIsi.innerHTML = data.isi;
            
            galeriModal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeGaleriModal() {
            galeriModal.classList.remove('open');
            document.body.style.overflow = 'auto';
        }

        galeriModal.addEventListener('click', (e) => {
            if (e.target.id === 'galeri-modal') {
                closeGaleriModal();
            }
        });
    </script>
    
</body>
</html>