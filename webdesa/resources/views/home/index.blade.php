@php
    use App\Models\Setting;
    $setting = Setting::first();
    $logo = $setting ? $setting->logo_path : null;

    $kepalaDesa = \App\Models\kades::latest()->first();
    $banners = \App\Models\banners::latest()->take(3)->where('status', 1)->get();
    $textBanner = \App\Models\text_banners::latest()->first();
    $sejarah = \App\Models\profil::latest()->first();
    $statistik = \App\Models\statistikDesa::latest()->first();
@endphp

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

    @include('home.header', ['logo' => $logo])

    <main>
        
        <section class="relative w-full h-[800px] overflow-hidden">
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
            <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col justify-end justify-center items-center rounded-b-3xl">
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
            
        <section class="max-w-6xl mx-auto p-6 md:p-12 space-y-6 fade-in">
            <h3 class="text-2xl font-bold text-center text-gray-800 select-none">Profil Desa Pasiraman</h3>
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-16">
                <div class="flex-shrink-0 relative w-40 md:w-48">
                    @if($kepalaDesa)
                        <div class="rounded-xl overflow-hidden shadow-lg border border-gray-200 bg-white">
                            <img src="{{ $kepalaDesa->gambar ? asset('storage/kepala-desa/' . $kepalaDesa->gambar) : asset('images/default-profile.png') }}"
                                alt="{{ $kepalaDesa->nama ?? 'Kepala Desa' }}"
                                class="w-full h-auto object-cover" onerror="this.style.display='none'" />
                        </div>
                        <div class="bg-sky-300 text-xs text-white font-semibold py-1 rounded text-center mt-2">
                            {{ $kepalaDesa->nama ?? '-' }}
                        </div>
                        <div class="bg-gray-700 text-xs text-white font-semibold py-1 rounded text-center mt-1">
                            {{ $kepalaDesa->jabatan ?? 'Kepala Desa Pasiraman' }}
                        </div>
                    @else
                        <div class="rounded-xl overflow-hidden shadow-lg border border-gray-200 bg-white">
                            <img src="{{ asset('images/default-profile.png') }}"
                                alt="Kepala Desa"
                                class="w-full h-auto object-cover" onerror="this.style.display='none'" />
                        </div>
                        <div class="bg-sky-300 text-xs text-white font-semibold py-1 rounded text-center mt-2">
                            Tidak ada data
                        </div>
                        <div class="bg-gray-700 text-xs text-white font-semibold py-1 rounded text-center mt-1">
                            Kepala Desa Pasiraman
                        </div>
                    @endif
                </div>
                <div class="text-gray-900 max-w-3xl relative">
                    <p class="text-sm leading-relaxed mb-6 text-justify">
                        @if($sejarah && $sejarah->profil)
                            {!! $sejarah->profil !!}
                        @else
                            <span class="italic">Belum ada profil desa yang tersedia.</span>
                        @endif
                    </p>
                    <button class="bg-gray-700 text-gray-100 px-5 py-2 rounded-full text-xs hover:bg-gray-600 transition" aria-label="Lihat Selengkapnya Profil Desa">
                        Lihat Selengkapnya --
                    </button>
                </div>
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

    @include('home.footer')

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