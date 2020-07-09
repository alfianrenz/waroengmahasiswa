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

                <!-- Data Akun -->
                <li class="nav-item pcoded-hasmenu <?= active_menu('akun'); ?>">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext"> Pengguna</span></a>
                    <ul class="pcoded-submenu">
                        <li class="<?php echo $this->uri->segment(2) == 'data_akun_mahasiswa' || $this->uri->segment(2) == 'detail_akun_mahasiswa' || $this->uri->segment(2) == 'detail_produk_mahasiswa' || $this->uri->segment(2) == 'view_detail_produk' ? 'active' : '' ?>"><a href="<?= site_url('akun/data_akun_mahasiswa'); ?>">Mahasiswa</a></li>
                        <li class="<?php echo $this->uri->segment(2) == 'data_akun_umum' || $this->uri->segment(2) == 'detail_akun_umum' ? 'active' : '' ?>"><a href="<?= site_url('akun/data_akun_umum'); ?>">Pengguna Umum</a></li>
                    </ul>
                </li>
                <!-- Transaksi -->
                <li class="nav-item <?= active_menu('transaksi'); ?>">
                    <a href="<?= site_url('transaksi/data_transaksi'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                        <span class="pcoded-mtext">Transaksi</span>
                    </a>
                </li>
                <!-- Laporan -->
                <li class="nav-item <?= active_menu('laporan'); ?>">
                    <a href="<?= site_url('laporan/laporan_transaksi'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                        <span class="pcoded-mtext">Laporan</span>
                    </a>
                </li>
                <!-- Kategori -->
                <li class="nav-item <?= active_menu('kategori'); ?>">
                    <a href="<?= site_url('kategori'); ?>" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                        <span class="pcoded-mtext">Kategori</span>
                    </a>
                </li>
                <!-- Website -->
                <li class="nav-item pcoded-hasmenu <?= active_menu('website'); ?>">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-life-buoy"></i></span><span class="pcoded-mtext"> Website</span></a>
                    <ul class="pcoded-submenu">
                        <li class="<?php echo $this->uri->segment(2) == 'data_slider' || $this->uri->segment(2) == 'tambah_slider' || $this->uri->segment(2) == 'edit_slider' ? 'active' : '' ?>"><a href="<?= site_url('website/data_slider'); ?>"> Slider</a></li>
                        <li class="<?= $this->uri->segment(2) == 'edit_profile_website' ? 'active' : '' ?>"><a href="<?= site_url('website/edit_profile_website'); ?>">Profile</a></li>
                        <li class="<?= $this->uri->segment(2) == 'edit_bantuan' ? 'active' : '' ?>"><a href="<?= site_url('website/edit_bantuan'); ?>">Bantuan</a></li>
                        <li class="<?= $this->uri->segment(2) == 'tentang_warma' ? 'active' : ''; ?>"><a href="<?= site_url('website/edit_tentang_warma'); ?>">Tentang Warma</a></li>
                        <li class=""><a href="<?= site_url('beranda'); ?>" target="blank">Lihat Website</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Pengaturan</label>
                </li>

                <!-- Profile-->
                <li class="nav-item pcoded-hasmenu <?= active_menu('profile'); ?>">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext"> Akun Saya</span></a>
                    <ul class="pcoded-submenu">
                        <li class="<?php echo $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'edit_profile_admin' ? 'active' : '' ?>"><a href="<?= site_url('profile/index'); ?>">Profile</a></li>
                        <li class="<?php echo $this->uri->segment(2) == 'ubah_password_admin' ? 'active' : '' ?>"><a href="<?= site_url('profile/ubah_password_admin'); ?>">Ubah Password</a></li>
                    </ul>
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