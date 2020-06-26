<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="<?= base_url('upload/foto_user/' . $s_mahasiswa['foto_mahasiswa']); ?>" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details"><?= $s_mahasiswa['nama_mahasiswa']; ?></div>
                    </div>
                </div>
            </div>
            <br>

            <ul class="nav pcoded-inner-navbar ">
                <!-- Dashboard -->
                <li class="nav-item <?= active_menu('dashboard'); ?>">
                    <a href="<?= site_url('dashboard/penjual'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Utama</label>
                </li>

                <!-- Produk -->
                <li class="nav-item <?= active_menu('produk'); ?>">
                    <a href="<?= site_url('produk/data_produk'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                        <span class="pcoded-mtext">Produk</span>
                    </a>
                </li>
                <!-- Pesanan -->
                <li class="nav-item">
                    <a href="" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                        <span class="pcoded-mtext">Pesanan</span>
                    </a>
                </li>
                <!-- Laporan -->
                <li class="nav-item">
                    <a href="" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                        <span class="pcoded-mtext">Laporan</span>
                    </a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Utilities</label>
                </li>

                <!-- Lihat Website -->
                <li class="nav-item">
                    <a href="<?= site_url('beranda'); ?>" class="nav-link" target="_blank">
                        <span class="pcoded-micon"><i class="feather icon-eye"></i></span>
                        <span class="pcoded-mtext">Lihat Website</span>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a href="<?= site_url('auth/logout_mahasiswa'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                        <span class="pcoded-mtext">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>