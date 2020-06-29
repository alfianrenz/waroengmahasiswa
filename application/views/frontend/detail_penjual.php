<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                <li>Detail Penjual</li>
            </ul>
        </div>
    </div>
</div>

<!-- Page Conttent -->
<main class="page-content">

    <!-- Product Details Area -->
    <div class="product-details-area bg-white ptb-30">
        <div class="container">

            <!-- Profile -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2 text-center">
                            <img src="<?= base_url('upload/foto_user/' . $penjual['foto_mahasiswa']); ?>" alt="" class="img-fluid rounded-circle ml-4 mt-3" width="150px" style="object-fit: cover;">
                        </div>
                        <div class="col-sm-3 border-right">
                            <h5 class="mb-2 mt-4 ml-4"><?= $penjual['nama_mahasiswa']; ?></h5>
                            <p class="mb-0 ml-4"><?= $penjual['nim']; ?></p>
                            <p class="ml-4"><?= $penjual['nama_prodi']; ?></p>
                            <a href="" class="btn btn-sm btn-success text-white mb-0 ml-4">Chat Penjual</a>
                        </div>
                        <div class="col-sm-7">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless mb-0" style="border-style: none;">
                                    <tbody>
                                        <tr>
                                            <td width="30%">Fakultas</td>
                                            <td>:&nbsp;&nbsp; <?= $penjual['nama_fakultas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:&nbsp;&nbsp; <?= $penjual['email_mahasiswa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Telepon</td>
                                            <td>:&nbsp;&nbsp; <?= $penjual['telepon_mahasiswa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bergabung</td>
                                            <td>:&nbsp;&nbsp; <?= $penjual['tanggal_daftar']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:&nbsp;&nbsp; <?= $penjual['alamat_mahasiswa']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header --->
            <div class="shop-filters mt-30">
                <div class="shop-filters-viewmode">
                    <button class="is-active" data-view="grid"><i class="ion ion-ios-keypad"></i></button>
                    <button data-view="list"><i class="ion ion-ios-list"></i></button>
                </div>
                <span class="shop-filters-viewitemcount">DAFTAR PRODUK</span>
                <div class="shop-filters-sortby">

                </div>
            </div>

            <!-- Daftar Produk -->
            <div class="shop-page-products mt-30">
                <div class="row no-gutters">

                    <?php foreach ($produk as $p) : ?>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-12">
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
                                    <h5 class="hoproduct-title"><a id="nama-produk-<?= $p['id_produk'] ?>" href="<?= site_url('produk/detail_produk_frontend/' . $p['id_produk']); ?>"><?= $p['nama_produk']; ?></a></h5>
                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">
                                            <span class="price" id="price-produk-<?= $p['id_produk'] ?>">Rp <?= number_format($p['harga_produk'], 0, ',', '.'); ?></span>
                                        </div>
                                    </div>
                                    <p class="hoproduct-content-description">
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
        </div>
    </div>

</main>