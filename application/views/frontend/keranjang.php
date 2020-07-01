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
                        <tr>
                            <td class="align-middle"></td>
                            <td class="align-middle text-center"></td>
                            <td class="align-middle text-center"></td>
                            <td class="align-middle text-center"></td>
                            <td class="align-middle text-center"></td>
                            <td class="align-middle text-center"></td>
                            <td class="align-middle text-center">
                                <a href="" class="btn btn-sm btn-secondary rounded tombol-hapus text-white"><i class="lnr lnr-trash"></i></a>
                            </td>
                        </tr>
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


<!-- <main class="page-content">
    <div class="cart-page-area ptb-30 bg-white">
        <div class="container">

            <?php echo $this->session->userdata('message'); ?>

            <div class="dt-responsive table-responsive">
                <table id="simpletable" class="table table-de nowrap">
                    <thead>
                        <tr>
                            <th width="3%"></th>
                            <th width="10%" class="text-center">Foto</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Harga Satuan</th>
                            <th class="text-center">Kuantitas</th>
                            <th class="text-center">Total Harga</th>
                            <th width="8%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_belanja = 0;
                        foreach ($detail_keranjang as $detail) : ?>
                            <tr>
                                <td class="align-middle">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"></label>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <img src="<?= base_url('upload/foto_produk/' . $detail['foto_produk']); ?>" alt="contact-img" title="contact-img" class="rounded" height="60" width="60" style="object-fit: cover">
                                </td>
                                <td class="align-middle text-center"><?= $detail['nama_produk']; ?></td>
                                <td class="align-middle text-center">Rp <?= number_format($detail['harga_produk'], 0, ',', '.'); ?></td>
                                <td class="align-middle text-center">
                                    <form method="POST" action="<?= site_url('keranjang/update_kuantitas/' . $detail['id_detail']) ?>" id="detail-keranjang-<?= $detail['id_detail'] ?>">
                                        <input type="hidden" name="id_produk" value="<?= $detail['id_produk']; ?>">
                                        <input onchange="updateKuantitas(<?= $detail['id_detail'] ?>)" type="number" class="text-center" name="kuantitas" value="<?= $detail['kuantitas']; ?>" min="1" step="1" class="c-input-text qty text">
                                    </form>
                                </td>
                                <td class="align-middle text-center">
                                    <?php
                                    $harga = $detail['harga_produk'];
                                    $kuantitas = $detail['kuantitas'];
                                    $subtotal = $harga * $kuantitas;
                                    $total_belanja = $total_belanja + $subtotal;
                                    echo 'Rp' . number_format($subtotal, 0, ',', '.');
                                    ?>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?= site_url('keranjang/hapus_produk/' . $detail['id_detail']); ?>" class="btn btn-sm btn-secondary rounded tombol-hapus text-white"><i class="lnr lnr-trash"></i></a>
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
                                <a href="" class="ho-button ho-button-sm">
                                    <span>Kosongkan Keranjang</span>
                                </a>
                                <a href="<?= site_url('produk/data_produk_frontend'); ?>" class="ho-button ho-button-sm">
                                    <span>Lanjutkan Belanja</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="cart-content-right">
                            <h4>TOTAL BELANJA</h4>
                            <h1 class="text-primary">Rp <?= $total_belanja; ?></h1>
                            <a href="<?= site_url('checkout/halaman_checkout'); ?>" class="ho-button">
                                <span>Checkout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main> -->