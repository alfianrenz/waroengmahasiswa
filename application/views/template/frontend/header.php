<header class="header header-3">
    <!-- Header Top Area -->
    <div class="header-top bg-theme">
        <div class=" container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                    <p class="header-welcomemsg">Welcome to Waroeng Mahasiswa CIC !</p>
                </div>

                <?php if (!$this->session->userdata('id')) { ?>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                        <div class="header-langcurr">
                            <div class="select-currency">
                                <button class="select-currency-current">Masuk</button>
                                <ul class="select-currency-list dropdown-list">
                                    <li><a href="<?= site_url('auth/login_mahasiswa'); ?>">Mahasiswa</a></li>
                                    <li><a href="<?= site_url('auth/login_umum'); ?>">Umum</a></li>
                                </ul>
                            </div>
                            <div class="select-language">
                                <button class="select-language-current">Daftar</button>
                                <ul class="select-language-list dropdown-list">
                                    <li><a href="<?= site_url('auth/buat_akun_mahasiswa'); ?>">Mahasiswa</a></li>
                                    <li><a href="<?= site_url('auth/buat_akun_umum'); ?>">Umum</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                        <div class="header-langcurr">
                            <div class="select-currency">
                                <button class="select-currency-current">Bantuan</button>
                                <ul class="select-currency-list dropdown-list">
                                    <li><a href="<?= site_url('auth/login_mahasiswa'); ?>">Penjual</a></li>
                                    <li><a href="<?= site_url('auth/login_umum'); ?>">Pembeli</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <!-- Header Middle Area -->
    <div class="header-middle bg-theme">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-sm-6 order-1 order-lg-1">
                    <a href="<?= site_url('beranda'); ?>" class="header-logo">
                        <img src="<?= base_url(); ?>assets/frontend/images/logo/logo-warma.png" alt="logo" width="180px">
                    </a>
                </div>
                <div class="col-lg-6 col-12 order-3 order-lg-2">
                    <form action="#" class="header-searchbox">
                        <select class="select-searchcategory" name="kategori">
                            <option>Kategori</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" placeholder="Apa yang kamu cari hari ini?">
                        <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
                    <div class="header-icons">

                        <?php if ($this->session->userdata('id')) { ?>
                            <div class="header-account">
                                <button class="header-accountbox-trigger"><span class="lnr lnr-user"></span> <?= $this->session->userdata('nama'); ?> <i class="ion ion-ios-arrow-down"></i></button>
                                <ul class="header-accountbox dropdown-list">
                                    <li><a href="<?= site_url('dashboard/pembeli'); ?>">Dashboard</a></li>
                                    <li><a href="<?= site_url('keranjang/halaman_keranjang'); ?>">Keranjang</a></li>

                                    <?php if ($this->session->userdata('tipe') == 1) { ?>
                                        <li><a href="<?= site_url('auth/logout_mahasiswa'); ?>">Logout</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?= site_url('auth/logout_umum'); ?>">Logout</a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        <?php } else { ?>
                            <div class="header-account">
                                <a href=""><button class="header-accountbox-trigger"><span class="lnr lnr-user"></span> Akun Saya</button></a>
                            </div>
                        <?php } ?>

                        <!-- Keranjang -->
                        <div class="header-cart">
                            <a class="header-carticon" href="cart.html"><i class="lnr lnr-cart"></i><span class="count">0</span></a>
                            <div class="header-minicart minicart">
                                <div class="minicart-header">
                                    <div class="text-center mb-4">
                                        <img src="<?= base_url(); ?>assets/frontend/images/others/cart.png" width="180px">
                                    </div>
                                    <div>
                                        <h5 class="text-dark text-center mb-2">Lho, Kok Kosong?</h5>
                                        <p class="text-muted text-center mb-4">Mau di isi apa ya keranjang sebesar ini?</p>
                                    </div>
                                </div>
                                <div class="minicart-footer">
                                    <a href="<?= site_url('produk/data_produk_frontend'); ?>" class="ho-button ho-button-fullwidth">
                                        <span><b>BELANJA SEKARANG</b></span>
                                    </a>
                                </div>

                                <!-- <div class="minicart-header">
                                    <div class="minicart-product">
                                        <div class="minicart-productimage">
                                            <a href="product-details.html">
                                                <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-1.jpg" alt="product image">
                                            </a>
                                            <span class="minicart-productquantity">1x</span>
                                        </div>
                                        <div class="minicart-productcontent">
                                            <h6><a href="product-details.html">P-Series 4K UHD Dolby Vision HDR
                                                    Roku Smart TV</a></h6>
                                            <span class="minicart-productprice">$43.00</span>
                                        </div>
                                        <button class="minicart-productclose"><i class="ion ion-ios-close-circle"></i></button>
                                    </div>
                                    <div class="minicart-product">
                                        <div class="minicart-productimage">
                                            <a href="product-details.html">
                                                <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-2.jpg" alt="product image">
                                            </a>
                                            <span class="minicart-productquantity">1x</span>
                                        </div>
                                        <div class="minicart-productcontent">
                                            <h6><a href="product-details.html">HD Video Recording PJ Handycam
                                                    Camcorder</a></h6>
                                            <span class="minicart-productprice">$43.00</span>
                                        </div>
                                        <button class="minicart-productclose"><i class="ion ion-ios-close-circle"></i></button>
                                    </div>
                                </div>
                                <ul class="minicart-pricing">
                                    <li>Total Belanja<span>Rp 10.000</span></li>
                                </ul>
                                <div class="minicart-footer">
                                    <a href="cart.html" class="ho-button ho-button-fullwidth">
                                        <span>Keranjang</span>
                                    </a>
                                    <a href="checkout.html" class="ho-button ho-button-dark ho-button-fullwidth">
                                        <span>Beli</span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Bottom Area -->
    <div class="header-bottom bg-theme">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 d-none d-lg-block">
                    <nav class="ho-navigation">
                        <ul>
                            <li class="<?= active_menu('beranda'); ?>"><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                            <li class="<?= active_menu('produk'); ?>"><a href="<?= site_url('produk/data_produk_frontend'); ?>">Produk</a></li>
                            <li class="<?= active_menu('penjual'); ?>"><a href="<?= site_url('penjual/data_penjual'); ?>">Penjual</a></li>
                            <li class="<?= active_menu('tentang_warma'); ?>"><a href="<?= site_url('tentang_warma'); ?>">Tentang Warma</a></li>
                            <li><a href="contact.html">Bantuan</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <div class="header-contactinfo">
                        <i class="flaticon-support text-white"></i>
                        <span class="text-white">Hubungi Kami :</span>
                        <b class="text-white">089660979061</b>
                    </div>
                </div>
                <div class="col-12 d-block d-lg-none">
                    <div class="mobile-menu clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</header>