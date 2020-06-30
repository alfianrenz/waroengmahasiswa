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

            <!-- PROFILE PENJUAL -->
            <div class="pdetails-allinfo" style="margin-bottom: 10px;">
                <div class="tab-content" id="product-details-ontent">
                    <div class="tab-pane fade show active" id="product-details-area1" role="tabpanel" aria-labelledby="product-details-area1-tab">
                        <div class="pdetails-description">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2 text-center">
                                            <img src="<?= base_url('upload/foto_user/' . $produk['foto_mahasiswa']); ?>" alt="" class="img-fluid rounded-circle mt-1" width="100px" style="object-fit: cover;">
                                        </div>
                                        <div class="col-sm-3" style="margin-top:3px;">
                                            <h5 class="mb-0"><?= $produk['nama_mahasiswa']; ?></h5>
                                            <p><?= $produk['nama_prodi']; ?></p>
                                            <a href="<?= site_url('penjual/detail_penjual/' . $produk['id_mahasiswa']); ?>" class="btn btn-sm btn-primary text-white">Lihat Profil</a>
                                            <a href="https://api.whatsapp.com/send?phone=<?= $produk['telepon_mahasiswa']; ?>&text=Hai%20gan%20apakah%20barang%20masih%20ada?" class="btn btn-sm btn-success text-white" target="_blank">Chat Penjual</a>
                                        </div>
                                        <div class="col-sm-7 border-left align-self-center">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-borderless mb-0" style="border-style: none;">
                                                    <tbody>
                                                        <tr>
                                                            <td>Jumlah Produk</td>
                                                            <td>:&nbsp;&nbsp; 0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Studi</td>
                                                            <td>:&nbsp;&nbsp; <?= $produk['nama_prodi']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>:&nbsp;&nbsp; <?= $produk['alamat_mahasiswa']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>