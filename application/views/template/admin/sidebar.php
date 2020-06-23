<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="<?= base_url('upload/foto_user/' . $session['foto_admin']); ?>" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details"><?= $session['nama_admin']; ?></div>
                    </div>
                </div>
            </div>
            <br>

            <ul class="nav pcoded-inner-navbar ">
                <!-- Dashboard -->
                <li class="nav-item <?= active_menu('dashboard'); ?>">
                    <a href="<?= site_url('dashboard'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Utama</label>
                </li>
                <!-- Penjual -->
                <li class="nav-item <?= active_menu('penjual'); ?>">
                    <a href="<?= site_url('penjual/data_penjual'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                        <span class="pcoded-mtext">Mahasiswa</span>
                    </a>
                </li>
                <!-- Pelanggan -->
                <li class="nav-item">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                        <span class="pcoded-mtext">Pembeli</span>
                    </a>
                </li>
                <!-- Transaksi -->
                <li class="nav-item">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                        <span class="pcoded-mtext">Transaksi</span>
                    </a>
                </li>
                <!-- Kategori -->
                <li class="nav-item <?= active_menu('kategori'); ?>">
                    <a href="<?= site_url('kategori'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                        <span class="pcoded-mtext">Kategori</span>
                    </a>
                </li>
                <!-- Laporan -->
                <li class="nav-item">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                        <span class="pcoded-mtext">Laporan</span>
                    </a>
                </li>
                <!-- Website -->
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-life-buoy"></i></span><span class="pcoded-mtext"> Website</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="">Slider</a></li>
                        <li class=""><a href="">Profil</a></li>
                        <li class=""><a href="">Kontak</a></li>
                        <li class=""><a href="<?= site_url('beranda'); ?>" target="blank">Lihat Website</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Pengaturan</label>
                </li>
                <!-- Profile -->
                <li class="nav-item <?= active_menu('profile'); ?>">
                    <a href="<?= site_url('profile'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                        <span class="pcoded-mtext">Profile</span>
                    </a>
                </li>
                <!-- Logout -->
                <li class="nav-item">
                    <a href="<?= site_url('auth/logout_admin'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                        <span class="pcoded-mtext">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>