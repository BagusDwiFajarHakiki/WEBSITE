<div id="top-info-bar" class="bg-blue-600 text-white text-sm py-2 hidden md:block transition-transform duration-300 transform -translate-y-full">
    <div class="container mx-auto flex justify-between items-center px-4">
        <div class="flex flex-col md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-6">
            <span class="flex items-center space-x-2">
                <i class="fas fa-envelope"></i>
                <span>desapasiraman@email.com</span>
            </span>
            <span class="flex items-center space-x-2">
                <i class="fas fa-phone-alt"></i>
                <span>(021) 123-4567</span>
            </span>
        </div>
        
        <div class="flex flex-col md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-0">
            <span class="flex items-center space-x-2">
                <i class="fas fa-envelope"></i>
                <span>Senin - Sabtu : </span>
            </span>
            <span class="flex items-center space-x-2">
                <i class="fas fa-phone-alt"></i>
                <span>08.00 - 16.00 WIB</span>
            </span>
        </div>
    </div>
</div>

<header class="bg-white bg-opacity-80 p-4 text-gray-800 sticky top-0 z-30 shadow-md backdrop-blur-sm">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/home') }}" class="flex items-center space-x-3 group" style="text-decoration: none;">
            <div class="sidebar-brand-icon" style="cursor:pointer;" data-toggle="modal" data-target="#uploadLogoModal">
                @if (isset($logo) && $logo)
                    <img src="{{ asset('storage/logos/' . $logo) }}" alt="Logo Desa" style="max-width:50px;max-height:50px;">
                @else
                    <i class="fas fa-laugh-wink"></i>
                @endif
            </div>
            <div>
                <h1 class="font-semibold text-lg select-none">Desa Pasiraman</h1>
                <p class="text-sm select-none">Kecamatan Wonotirto</p>
            </div>
        </a>

        <button id="mobile-menu-button" class="md:hidden text-gray-800 hover:text-gray-600 transition focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <nav id="desktop-menu" class="hidden md:block">
            <ul class="flex space-x-6 text-sm font-semibold">
                <li><a href="{{ url('/home') }}" class="hover:underline hover:text-gray-600">Beranda</a></li>
                <li class="relative group">
                    <button
                        aria-haspopup="true"
                        aria-expanded="false"
                        id="profilDropdownButton"
                        class="hover:underline hover:text-gray-600 inline-flex items-center focus:outline-none"
                        >
                        Profil Desa
                        <svg class="ml-1 w-4 h-4 fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 4.5L14.5 7z"/>
                        </svg>
                    </button>
                    <ul
                        id="profilDropdownMenu"
                        class="absolute left-0 top-full mt-1 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-200 text-gray-800 z-50"
                        aria-label="submenu"
                    >
                        <li><a href="{{ url('/visi-misi') }}" class="block px-4 py-2 hover:bg-green-100">Visi Misi</a></li>
                        <li><a href="{{ url('/struktur-pemerintahan') }}" class="block px-4 py-2 hover:bg-green-100">Struktur Pemerintahan</a></li>
                    </ul>
                </li>
                <li><a href="#" class="hover:underline hover:text-gray-600">Statistik Desa</a></li>
                <li><a href="#" class="hover:underline hover:text-gray-600">BUMDes</a></li>
                <li><a href="#" class="hover:underline hover:text-gray-600">UMKM</a></li>
                <li><a href="#" class="hover:underline hover:text-gray-600">Berita & Kegiatan</a></li>
            </ul>
        </nav>
    </div>
</header>

<div id="mobile-menu-overlay" class="hidden md:hidden"></div>
    <nav id="mobile-menu" class="hidden md:hidden">
        <div class="flex justify-between items-center p-4">
            <div class="flex items-center space-x-3">
                <div class="sidebar-brand-icon" style="cursor:pointer;" data-toggle="modal" data-target="#uploadLogoModal">
                @if (isset($logo) && $logo)
                    <img src="{{ asset('storage/logos/' . $logo) }}" alt="Logo Desa" style="max-width:50px;max-height:50px;">
                @else
                    <i class="fas fa-laugh-wink"></i>
                @endif
            </div>
                <div>
                    <h1 class="font-semibold text-lg text-gray-900 select-none">Desa Pasiraman</h1>
                    <p class="text-sm select-none">Kecamatan Wonotirto</p>
                </div>
            </div>
            <button id="mobile-menu-close-button" class="text-gray-500 hover:text-gray-700 transition focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="flex-grow text-gray-800">
            <a href="{{ url('/home') }}" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-100 transition-colors">Beranda</a>
            <div class="relative">
                <button id="mobile-profil-dropdown-button" class="w-full flex justify-between items-center px-4 py-3 border-b border-gray-200 hover:bg-gray-100 transition-colors">
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
            <a href="#xx" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-100 transition-colors">Statistik</a>
            <a href="#" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-100 transition-colors">BUMDes</a>
            <a href="#" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-100 transition-colors">UMKM</a>
            <a href="#" class="block px-4 py-3 border-b border-gray-200 hover:bg-gray-100 transition-colors">Berita & Kegiatan</a>
        </div>
    </nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const topInfoBar = document.getElementById('top-info-bar');
        let lastScrollTop = 0;

        // Tampilkan bar saat halaman dimuat
        topInfoBar.classList.remove('hidden', '-translate-y-full');
        topInfoBar.classList.add('translate-y-0');

        window.addEventListener('scroll', function() {
            const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScrollTop > lastScrollTop) {
                // Scroll ke bawah
                topInfoBar.classList.remove('translate-y-0');
                topInfoBar.classList.add('-translate-y-full');
            } else {
                // Scroll ke atas
                topInfoBar.classList.remove('-translate-y-full');
                topInfoBar.classList.add('translate-y-0');
            }
            lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop;
        });
    });
</script>