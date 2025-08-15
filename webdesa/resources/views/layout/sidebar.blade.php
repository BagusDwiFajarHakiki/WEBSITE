<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon" style="cursor:pointer;" data-toggle="modal" data-target="#uploadLogoModal">
            @if (isset($logo) && $logo)
                <img src="{{ asset('storage/logos/' . $logo) }}" alt="Logo Desa" style="max-width:40px;max-height:40px;">
            @else
                <i class="fas fa-laugh-wink"></i>
            @endif
        </div>

        <div class="sidebar-brand-text mx-3">ADMIN DESA PASIRAMAN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span>
        </a>
    </li>

    <!-- Modal -->
        <div class="modal fade" id="uploadLogoModal" tabindex="-1" role="dialog" aria-labelledby="uploadLogoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form action="{{ route('upload.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadLogoModalLabel">Upload Logo Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" name="logo" class="form-control" accept="image/*" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
                </div>
            </form>
            </div>
        </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Beranda Collapse Menu -->
    <li class="nav-item {{ request()->is('video_profil') || request()->is('kades') || request()->is('pengumuman') ? 'active' : '' }}">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseBeranda"
            aria-expanded="true" aria-controls="collapseBeranda">
            <i class="fas fa-fw fa-home"></i>
            <span>BERANDA</span>
        </a>
        <div id="collapseBeranda" class="collapse" aria-labelledby="headingBeranda" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Beranda Menu:</h6>
                <a class="collapse-item" href="/video_profil"><i class="fas fa-video mr-2"></i>Video Profil</a>
                <a class="collapse-item" href="/banner"><i class="fas fa-images mr-2"></i>Banner Utama</a>
                <a class="collapse-item" href="/kades"><i class="fas fa-newspaper mr-2"></i>Data Kepala Desa</a>
                <a class="collapse-item" href="/pengumuman"><i class="fas fa-bullhorn mr-2"></i>Pengumuman</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Profil Desa Collapse Menu -->
    <li class="nav-item {{ request()->is('profil_desa') || request()->is('sejarah_desa') || request()->is('visi_misi') || request()->is('perangkat_desa') || request()->is('peta_desa') ? 'active' : '' }}">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseProfilDesa"
            aria-expanded="true" aria-controls="collapseProfilDesa">
            <i class="fas fa-fw fa-id-card"></i>
            <span>PROFIL DESA</span>
        </a>
        <div id="collapseProfilDesa" class="collapse" aria-labelledby="headingProfilDesa" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Profil Desa Menu:</h6>
                <a class="collapse-item" href="/profil"><i class="fas fa-history mr-2"></i>Informasi Desa</a>
                <a class="collapse-item" href="/perangkat"><i class="fas fa-user mr-2"></i>Perangkat Desa</a>
                <a class="collapse-item" href="/struktur"><i class="fas fa-users mr-2"></i>Struktur Desa</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Statistik Collapse Menu -->
    <li class="nav-item {{ request()->is('data-statistik-desa') ? 'active' : '' }}">
        <a class="nav-link" href="/data-statistik-desa">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>STATISTIK DESA</span>
        </a>
    </li>

    <!-- Nav Item - BUMDes Collapse Menu -->
    <li class="nav-item {{ request()->is('profil_bumdes') || request()->is('usaha_bumdes') ? 'active' : '' }}">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseBUMDes"
            aria-expanded="true" aria-controls="collapseBUMDes">
            <i class="fas fa-fw fa-building"></i>
            <span>BUMDes</span>
        </a>
        <div id="collapseBUMDes" class="collapse" aria-labelledby="headingBUMDes"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">BUMDes Menu:</h6>
                <a class="collapse-item" href="/profil_bumdes"><i class="fas fa-address-card mr-2"></i>Profil BUMDes</a>
                <a class="collapse-item" href="/usaha_bumdes"><i class="fas fa-briefcase mr-2"></i>Usaha BUMDes</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - UMKM Collapse Menu -->
    <li class="nav-item {{ request()->is('umkm') ? 'active' : '' }}">
        <a class="nav-link" href="/umkm">
            <i class="fas fa-fw fa-store-alt"></i>
            <span>UMKM</span></a>
    </li>

    <!-- Nav Item - KKN Collapse Menu -->
    <li class="nav-item {{ request()->is('kkn') ? 'active' : '' }}">
        <a class="nav-link" href="/kkn">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>KKN</span></a>
    </li>

    <!-- Nav Item - Gallery Collapse Menu -->
    <li class="nav-item {{ request()->is('gallery') ? 'active' : '' }}">
        <a class="nav-link" href="/gallery">
            <i class="fas fa-fw fa-images"></i>
            <span>BERITA</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>