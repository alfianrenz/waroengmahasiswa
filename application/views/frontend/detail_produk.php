<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                <li>Detail Produk</li>
            </ul>
        </div>
    </div>
</div>

<!-- Page Conttent -->
<main class="page-content">

    <!-- Product Details Area -->
    <div class="product-details-area bg-white ptb-30">
        <div class="container">
            <div class="pdetails">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pdetails-images">
                            <div class="pdetails-largeimages pdetails-imagezoom">
                                <div class="pdetails-singleimage" data-src="<?= base_url('upload/foto_produk/' . $produk['foto_produk']); ?>">
                                    <img src="<?= base_url('upload/foto_produk/' . $produk['foto_produk']); ?>" alt="product image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pdetails-content">
                            <h2><?= $produk['nama_produk']; ?></h2>
                            <div class="pdetails-pricebox">
                                <span class="price">Rp <?= number_format($produk['harga_produk'], 0, ',', '.'); ?></span>
                            </div>
                            <p><?= $produk['deskripsi_produk']; ?></p>
                            <div class="pdetails-quantity">
                                <a href="shop-rightsidebar.html" class="ho-button">
                                    <i class="lnr lnr-cart"></i>
                                    <span>&nbsp;Tambahkan Ke Keranjang</span>
                                </a>
                            </div>
                            <div class="pdetails-categories">
                                <span>Kategori :</span>
                                <ul>
                                    <li><a href="shop-rightsidebar.html"><?= $produk['nama_kategori']; ?></a></li>
                                </ul>
                            </div>
                            <div class="pdetails-tags">
                                <span>Stok :</span>
                                <ul>
                                    <li><a href="shop-rightsidebar.html"><?= $produk['stok_produk']; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pdetails-allinfo">
                <ul class="nav pdetails-allinfotab" id="product-details" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-details-area1-tab" data-toggle="tab" href="#product-details-area1" role="tab" aria-controls="product-details-area1" aria-selected="true">PROFIL PENJUAL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-details-area2-tab" data-toggle="tab" href="#product-details-area2" role="tab" aria-controls="product-details-area2" aria-selected="false">KOMENTAR</a>
                    </li>
                </ul>

                <div class="tab-content" id="product-details-ontent">
                    <div class="tab-pane fade show active" id="product-details-area1" role="tabpanel" aria-labelledby="product-details-area1-tab">
                        <div class="pdetails-description">
                            Indonesia :
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-details-area2" role="tabpanel" aria-labelledby="product-details-area2-tab">
                        <div class="pdetails-moreinfo">
                            AHSDADJASDKL
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>