<footer class="footer bg-white">

    <!-- Footer Top Area -->
    <div class="footer-toparea border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="footer-widget widget-info">
                        <h5 class="footer-widget-title">Kontak Kami</h5>
                        <p>Hubungi kontak dibawah ini bila ada pertanyaan</p>
                        <ul>
                            <li class="text-muted"><i class="ion ion-ios-pin text-muted"></i> <?= $website['alamat']; ?> </li>
                            <li class="text-muted"><i class="ion ion-ios-call text-muted"></i> Telepon : +<?= $website['telepon']; ?></li>
                            <li class="text-muted"><i class="ion ion-ios-mail text-muted"></i> Email : <?= $website['email']; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget widget-links">
                        <h5 class="footer-widget-title">AKUN SAYA</h5>
                        <ul>
                            <li><a href="#">Pesanan Saya</a></li>
                            <li><a href="#">Transaksi</a></li>
                            <li><a href="#">Profil Saya</a></li>
                            <li><a href="#">Keranjang</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget widget-links">
                        <h5 class="footer-widget-title">APLIKASI KAMPUS</h5>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottomarea">
        <div class="container">
            <div class="footer-copyright">
                <p class="copyright">Copyright &copy; <a href="<?= site_url('beranda'); ?>">Waroeng Mahasiswa CIC</a> By Alfian</p>
            </div>
        </div>
    </div>

</footer>