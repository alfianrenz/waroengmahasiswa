  <!-- Slider -->
  <div class="herobanner herobanner-2 slider-navigation slider-dots slider-dots-center">

      <!-- Herobanner Single -->
      <div class="herobanner-single">
          <img src="<?= base_url(); ?>assets/frontend/images/hero/slider-1.png" alt="hero image">
          <div class="herobanner-content">
              <div class="herobanner-box" style="margin-left:50px">
                  <h4 style="color:#7e7e7e">SELAMAT DATANG DI</h4>
              </div>
              <div class="herobanner-box" style="margin-left:50px">
                  <h1 style="color:#363636;"><b>Waroeng</b> <span style="color:#0B88EE"><b>Mahasiswa</b></span></h1>
              </div>
              <div class="herobanner-box" style="margin-left:50px">
                  <p style="color:#7e7e7e">Pasarnya mahasiswa Universitas Catur Insan Cendekia</p>
              </div>
              <div class="herobanner-box" style="margin-left:50px">
                  <a href="<?= site_url('tentang_warma'); ?>" class="ho-button">
                      <span>Tentang Warma</span>
                  </a>
              </div>
          </div>
          <span class="herobanner-progress"></span>
      </div>

      <!-- Herobanner Single -->
      <div class="herobanner-single">
          <img src="<?= base_url(); ?>assets/frontend/images/hero/slider-1.png" alt="hero image">
          <div class="herobanner-content">
              <div class="herobanner-box" style="margin-left:50px">
                  <h4 style="color:#7e7e7e">SAATNYA MENJADI</h4>
              </div>
              <div class="herobanner-box" style="margin-left:50px">
                  <h1 style="color:#363636;"><b>Seorang</b><span style="color:#0B88EE"><b>Entrepreneur</b></span></h1>
              </div>
              <div class="herobanner-box" style="margin-left:50px">
                  <p style="color:#7e7e7e">Daftarkan dirimu dan jadilah pengusaha di era teknologi</p>
              </div>
              <div class="herobanner-box" style="margin-left:50px">
                  <a href="<?= site_url('auth/buat_akun_mahasiswa'); ?>" class="ho-button">
                      <span>Daftar</span>
                  </a>
              </div>
          </div>
          <span class="herobanner-progress"></span>
      </div>

  </div>

  <?= $this->session->userdata('message'); ?>

  <!-- Page Conttent -->
  <main class="page-content">

      <!-- Features Area -->
      <div class="ho-section features-area bg-white ptb-30">
          <div class="container">
              <div class="row">

                  <!-- Single Feature -->
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="featurebox">
                          <i class="flaticon-support-1"></i>
                          <h5>Setia 24 Jam</h5>
                          <p>Jika ada kesulitan hubungi kontak kami</p>
                      </div>
                  </div>

                  <!-- Single Feature -->
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="featurebox">
                          <i class="flaticon-money-back"></i>
                          <h5>Harga Mahasiswa</h5>
                          <p>Produk yang dijual sesuai kantong kok</p>
                      </div>
                  </div>

                  <!-- Single Feature -->
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="featurebox">
                          <i class="flaticon-credit-card"></i>
                          <h5>Payment Gateway</h5>
                          <p>Bisa bayar lewat alfamart dan Indomaret</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Newarrival, Best seller & Features Product -->
      <div class="ho-section newarrival-bestseller-featured-product mtb-30">
          <div class="container">
              <div class="section-title-2">
                  <ul class="nav" id="bstab3" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="bstab3-area1-tab" data-toggle="tab" href="#bstab3-area1" role="tab" aria-controls="bstab3-area1" aria-selected="true">PRODUK TERBARU</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="bstab3-area2-tab" data-toggle="tab" href="#bstab3-area2" role="tab" aria-controls="bstab3-area2" aria-selected="false">PRODUK TERLARIS</a>
                      </li>
                  </ul>
              </div>

              <!-- Produk Terbaru -->
              <div class="tab-content" id="bstab3-ontent">
                  <div class="tab-pane fade show active" id="bstab3-area1" role="tabpanel" aria-labelledby="bstab3-area1-tab">
                      <div class="product-slider new-best-featured-slider slider-navigation-2">
                          <?php foreach ($produk as $p) : ?>
                              <div class="product-slider-col">
                                  <!-- Single Product -->
                                  <article class="hoproduct">
                                      <div class="hoproduct-image">
                                          <a class="hoproduct-thumb" href="<?= site_url('produk/detail_produk_frontend/' . $p['id_produk']); ?>">
                                              <img id="foto-produk-<?= $p['id_produk'] ?>" class="hoproduct-frontimage" src="<?= base_url('upload/foto_produk/' . $p['foto_produk']); ?>" alt="product image">
                                          </a>
                                          <ul class="hoproduct-actionbox">
                                              <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                              <li><a href="#" onclick="showDetailProduk(<?= $p['id_produk'] ?>)"><i class="lnr lnr-eye"></i></a></li>
                                          </ul>
                                      </div>
                                      <div class="hoproduct-content">
                                          <h5 class="hoproduct-title"><a id="nama-produk-<?= $p['id_produk'] ?>" href="product-details.html"><?= $p['nama_produk']; ?></a></h5>
                                          <div class="hoproduct-pricebox">
                                              <div class="pricebox">
                                                  <span class="price" id="price-produk-<?= $p['id_produk'] ?>">Rp <?= number_format($p['harga_produk'], 0, ',', '.'); ?></span>
                                              </div>
                                          </div>
                                          <p class="hoproduct-content-description" style="display: none;">
                                              Kategori : <span id="nama-kategori-produk-<?= $p['id_produk'] ?>"><?= $p['nama_kategori']; ?></span><br>
                                              Stok Produk : <span id="stok_produk-<?= $p['id_produk'] ?>"><?= $p['stok_produk']; ?></span> buah
                                              <textarea style="display: none;" id="deskripsi-produk-<?= $p['id_produk'] ?>" class="is-invisible"><?= $p['deskripsi_produk'] ?></textarea>
                                          </p>
                                      </div>
                                  </article>
                              </div>
                          <?php endforeach; ?>
                      </div>
                  </div>

                  <!-- Produk Terlaris -->
                  <div class="tab-pane fade" id="bstab3-area2" role="tabpanel" aria-labelledby="bstab3-area2-tab">
                      <div class="product-slider new-best-featured-slider slider-navigation-2">
                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-4.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-5.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-15.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-12.jpg" alt="product image">
                                          <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-13.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-1.jpg" alt="product image">
                                          <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-22.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-7.jpg" alt="product image">
                                          <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-8.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-18.jpg" alt="product image">
                                          <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-19.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-15.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-12.jpg" alt="product image">
                                          <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-13.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-10.jpg" alt="product image">
                                          <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-11.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>

                          <div class="product-slider-col">
                              <!-- Single Product -->
                              <article class="hoproduct">
                                  <div class="hoproduct-image">
                                      <a class="hoproduct-thumb" href="product-details.html">
                                          <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-7.jpg" alt="product image">
                                          <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/frontend/images/product/product-image-8.jpg" alt="product image">
                                      </a>
                                      <ul class="hoproduct-actionbox">
                                          <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                          <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                          <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                      </ul>

                                  </div>
                                  <div class="hoproduct-content">
                                      <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                              Wireless Over-Ear Headphones</a></h5>

                                      <div class="hoproduct-pricebox">
                                          <div class="pricebox">

                                              <span class="price">$34.11</span>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!--// Single Product -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </main>