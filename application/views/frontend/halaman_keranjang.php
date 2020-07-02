<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                <li>Keranjang</li>
            </ul>
        </div>
    </div>
</div>

<?= $this->session->userdata('message'); ?>

<!-- Main Content -->
<main class="page-content">
    <div class="cart-page-area ptb-30 bg-white">
        <div class="container">

            <div class="dt-responsive table-responsive">
                <table id="simpletable" class="table table-de nowrap">
                    <thead>
                        <tr>
                            <th width="3%">#</th>
                            <th width="10%" class="text-center">Foto</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Harga Satuan</th>
                            <th class="text-center">Kuantitas</th>
                            <th class="text-center">Total Harga</th>
                            <th width="8%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($keranjang as $k) : ?>
                            <tr>
                                <td class="align-middle">
                                    <input type="checkbox" class="form-check-input" id="select_produk" name="select_produk">
                                    <label class="form-check-label" for="select_produk"></label>
                                </td>
                                <td class="align-middle text-center">
                                    <img src="<?= base_url('upload/foto_produk/' . $k['foto_produk']); ?>" alt="contact-img" title="contact-img" class="rounded" height="70" width="70" style="object-fit: cover">
                                </td>
                                <td class="align-middle text-center"><?= $k['nama_produk']; ?></td>
                                <td class="align-middle text-center">Rp<?= number_format($k['harga_produk'], 0, ',', '.'); ?></td>
                                <td class="align-middle text-center">
                                    <input type="number" class="text-center" name="kuantitas" value="<?= $k['kuantitas']; ?>" min="1" step="1">
                                </td>
                                <td class="align-middle text-center">
                                    <?php
                                    $harga_produk = $k['harga_produk'];
                                    $kuantitas = $k['kuantitas'];
                                    $total_harga = $harga_produk * $kuantitas;
                                    echo 'Rp' . number_format($total_harga, 0, ',', '.');
                                    ?>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?= site_url('keranjang/hapus_produk/' . $k['id_produk']); ?>" class="btn btn-sm btn-secondary rounded tombol-hapus text-white"><i class="lnr lnr-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="cart-content">
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="cart-content-left">
                            <div class="ho-buttongroup">
                                <a href="<?= site_url('produk/data_produk_frontend'); ?>" class="ho-button ho-button-sm">
                                    <span>Lanjutkan Belanja</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="cart-content-right">
                            <h4>TOTAL BELANJA</h4>
                            <h1 class="text-primary">Rp 40.000</h1>
                            <a href="<?= site_url('checkout/halaman_checkout'); ?>" class="ho-button">
                                <span>Checkout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>