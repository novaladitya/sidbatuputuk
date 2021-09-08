<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- ======= NamaDesa ======= -->
    <a class="brand-link">
        <span class="brand-text font-weight-light d-flex justify-content-center">Desa Batu Putuk</span>
    </a>
    <!-- ======= /NamaDesa ======= -->

    <!-- ======= MenuSidebar ======= -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="info">
                <a class="d-block">
                    <i class="fas fa-user"></i>
                    &nbsp;&nbsp;Admin
                </a>
            </div>
        </div>

        <!-- ======= MainMenu ======= -->
        <?php
        if (
            $halaman == 'carrousel'
            || $halaman == 'persentase pekerjaan'
            || $halaman == 'sambutan'
            || $halaman == 'kontak'
        ) {
            $navOpen = 'menu-open';
        } else {
            $navOpen = '';
        }
        ?>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-compact nav-child-indent nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- ManajemenKonten -->
                <li class="nav-header">Manajemen Konten</li>
                <li class="nav-item <?= $navOpen; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Beranda</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/carrousel" class="nav-link <?= $halaman == 'carrousel' ? 'active' : '' ?>">
                                <i class="fas fa-clone nav-icon"></i>
                                <p>Carrousel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/persentase-pekerjaan" class="nav-link <?= $halaman == 'persentase pekerjaan' ? 'active' : '' ?>">
                                <i class=" fas fa-percentage nav-icon"></i>
                                <p>Persentase Pekerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sambutan" class="nav-link <?= $halaman == 'sambutan' ? 'active' : '' ?>">
                                <i class=" fas fa-quote-right nav-icon"></i>
                                <p>Sambutan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/kontak" class="nav-link <?= $halaman == 'kontak' ? 'active' : '' ?>">
                                <i class=" fas fa-phone-alt nav-icon"></i>
                                <p>Kontak</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/profil-desa" class="nav-link <?= $halaman == 'profil_desa' ? 'active' : '' ?>">
                        <i class=" nav-icon fas fa-address-card"></i>
                        <p>Profil Desa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/lembaga-masyarakat" class="nav-link <?= $halaman == 'lembaga_masyarakat' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>Lembaga Masyarakat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/berita" class="nav-link <?= $halaman == 'berita' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/belanja" class="nav-link <?= $halaman == 'belanja' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Belanja</p>
                    </a>
                </li>
                <!-- /ManajemenKonten -->
            </ul>
        </nav>
        <!-- ======= /MainMenu ======= -->
    </div>
    <!-- ======= /MenuSidebar ======= -->
</aside>