<header class="header header-3">
    <!-- Header Top Area -->
    <div class="header-top bg-theme">
        <div class=" container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                    <p class="header-welcomemsg">Welcome to Waroeng Mahasiswa CIC !</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                    <div class="header-langcurr">
                        <div class="select-currency">
                            <button class="select-currency-current">Masuk</button>
                            <ul class="select-currency-list dropdown-list">
                                <li><a href="<?= site_url('auth/login_mahasiswa'); ?>">Sebagai Mahasiswa</a></li>
                                <li><a href="<?= site_url('auth/login_umum'); ?>">Dosen/Staff/Umum</a></li>
                            </ul>
                        </div>
                        <div class="select-language">
                            <button class="select-language-current">Daftar</button>
                            <ul class="select-language-list dropdown-list">
                                <li><a href="<?= site_url('auth/buat_akun_mahasiswa'); ?>">Sebagai Mahasiswa</a></li>
                                <li><a href="<?= site_url('auth/buat_akun_umum'); ?>">Dosen/Staff/Umum</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Middle Area -->
    <div class="header-middle bg-theme">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-sm-6 order-1 order-lg-1">
                    <a href="index.html" class="header-logo">
                        <img src="<?= base_url(); ?>assets/frontend/images/logo/logo-warma.png" alt="logo" width="180px">
                    </a>
                </div>
                <div class="col-lg-6 col-12 order-3 order-lg-2">
                    <form action="#" class="header-searchbox">
                        <select class="select-searchcategory">
                            <option value="0">Kategori</option>
                            <option value="1">Fashion</option>
                            <option value="2">Women</option>
                            <option value="3">Dresses</option>
                            <option value="4">Shirts</option>
                            <option value="5">Blazers</option>
                            <option value="6">Lingerie</option>
                            <option value="6">Jeans</option>
                            <option value="6">Shorts</option>
                            <option value="6">Sportswear</option>
                            <option value="6">Swimwear</option>
                            <option value="6">Kids</option>
                        </select>
                        <input type="text" placeholder="Apa yang kamu cari hari ini? ...">
                        <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
                    <div class="header-icons">
                        <div class="header-account">
                            <a href=""><button class="header-accountbox-trigger"><span class="lnr lnr-user"></span> Akun Saya</button></a>
                        </div>
                        <div class="header-cart">
                            <a class="header-carticon" href="cart.html"><i class="lnr lnr-cart"></i><span class="count">2</span></a>
                            <!-- Minicart -->
                            <div class="header-minicart minicart">
                                <div class="minicart-header">
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
                                    <li>Total <span>Rp 10.000</span></li>
                                </ul>
                                <div class="minicart-footer">
                                    <a href="cart.html" class="ho-button ho-button-fullwidth">
                                        <span>Keranjang</span>
                                    </a>
                                    <a href="checkout.html" class="ho-button ho-button-dark ho-button-fullwidth">
                                        <span>Beli</span>
                                    </a>
                                </div>
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
                            <li><a href="about-us.html">Produk</a></li>
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