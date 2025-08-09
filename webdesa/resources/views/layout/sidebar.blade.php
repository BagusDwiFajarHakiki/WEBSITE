<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
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


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Beranda Collapse Menu -->
    <li class="nav-item {{ request()->is('video_profil') || request()->is('pengumuman') ? 'active' : '' }}">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseBeranda"
            aria-expanded="true" aria-controls="collapseBeranda">
            <i class="fas fa-fw fa-home"></i>
            <span>BERANDA</span>
        </a>
        <div id="collapseBeranda" class="collapse" aria-labelledby="headingBeranda" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Beranda Menu:</h6>
                <a class="collapse-item" href="/video_profil"><i class="fas fa-video mr-2"></i>Video Profil</a>
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
                <a class="collapse-item" href="/profil"><i class="fas fa-history mr-2"></i>Data Desa</a>
                <a class="collapse-item" href="/perangkat_desa"><i class="fas fa-users mr-2"></i>Perangkat Desa</a>
                <a class="collapse-item" href="/peta_desa"><i class="fas fa-map-marked-alt mr-2"></i>Peta Desa</a>
            </div>
        </div>
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
            <span>GALLERY</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>