<footer class="footer bg-white">

    <!-- Footer Top Area -->
    <div class="footer-toparea border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
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
                <div class="col-lg-5 col-md-4 mr-5">
                    <div class="footer-widget widget-links">
                        <h5 class="footer-widget-title">TENTANG KAMI</h5>
                        <p style="text-align: justify;">Waroeng Mahasiswa adalah sebuah wadah bagi mahasiswa UCIC yang memiliki usaha di bidang jasa atau produk dan dapat dipasarkan melalui internal kampus ataupun eksternal kampus melalui media berbasis website. Warma merupakan salah satu bentuk produk yang dihasilkan oleh BKM CIC yang dikontribusikan melalui pelayanan BKM CIC kepada mahasiswa yang memiliki usaha.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget widget-links">
                        <h5 class="footer-widget-title">IKUTI KAMI</h5>
                        <ul>
                            <li><a href="#"><i class="ion ion-logo-instagram"></i>&nbsp;&nbsp;Instagram</a></li>
                            <li><a href="#"><i class="ion ion-logo-facebook"></i>&nbsp;&nbsp;Facebook</a></li>
                            <li><a href="#"><i class="ion ion-logo-twitter"></i>&nbsp;&nbsp;Twitter</a></li>
                            <li><a href="#"><i class="ion ion-logo-youtube"></i>&nbsp;&nbsp;Youtube</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottomarea">
        <div class="container">
            <div class="footer-copyright">
                <p class="copyright">Copyright &copy; <a href="<?= site_url('beranda'); ?>"><?= $website['nama_website']; ?></a> By Alfian</p>
            </div>
        </div>
    </div>

</footer>