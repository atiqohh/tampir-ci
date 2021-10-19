<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/logo.png" alt="logo">
        </div>
        <div class="sidebar-brand-text mx-3">TampirKulon</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/homeadmin">
            <i class="fas fa-th-large"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Reservasi -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-calendar-alt"></i>
            <span>Reservasi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                <a class="collapse-item" href="buttons.html">Wisata A</a>
                <a class="collapse-item" href="cards.html">Wisata B</a>
            </div>
        </div>
    </li> -->

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/admin/reservasiadmin/index_reservasi">
            <i class="far fa-calendar-alt"></i>
            <span>Reservasi</span></a>
    </li>

    <!-- Nav Item - Wisata -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/admin/wisataadmin/index_wisata">
            <i class="fas fa-map-marker-alt"></i>
            <span>Wisata</span></a>
    </li>

    <!-- Nav Item - Paket Wisata -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/admin/paketadmin/index_paket">
            <i class="fas fa-coins"></i>
            <span>Paket Wisata</span></a>
    </li>

    <!-- Nav Item - Pemandu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/admin/pemanduadmin/index_pemandu">
            <i class="fas fa-users"></i>
            <span>Pemandu</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Artikel -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/admin/artikeladmin/index_artikel">
            <i class="far fa-newspaper"></i>
            <span>Artikel</span></a>
    </li>

    <!-- Nav Item - Pengumuman -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/admin/pengumumanadmin/index_pengumuman">
            <i class="fas fa-bullhorn"></i>
            <span>Pengumuman</span></a>
    </li>

    <!-- Nav Item - Galeri -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/admin/galeriadmin/index_galeri">
            <i class="fas fa-photo-video"></i>
            <span>Galeri</span></a>
    </li>

    <!-- Nav Item - UMKM -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/admin/umkmadmin/index_umkm">
            <i class="far fa-file-alt"></i>
            <span>UMKM</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Admin List -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/user/admin/admin/index_admin">
            <i class="fas fa-users"></i>
            <span>User Admin</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->