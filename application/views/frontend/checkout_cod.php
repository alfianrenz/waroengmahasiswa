<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="page-content">

    <!-- Shop Page Area -->
    <div class="checkout-area bg-white pb-30">
        <div class="container">

            <form action="#" class="billing-info" method="post">
                <div class="row">
                    <!-- Alamat Pengiriman -->
                    <div class="col-lg-6">
                        <h3 class="small-title">PENERIMA</h3>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td>Nama Penerima</td>
                                    <td>:&nbsp;&nbsp; <?= $this->session->userdata('nama'); ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>:&nbsp;&nbsp; <?= $this->session->userdata('telepon'); ?></td>
                                </tr>
                                <tr>
                                    <td>Email Penerima</td>
                                    <td>:&nbsp;&nbsp; <?= $this->session->userdata('email'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <h3 class="small-title mt-30">LOKASI TRANSAKSI</h3>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="floating-label">Waktu Ketemuan</label>
                                <input type="date" class="form-control" id="waktu" name="waktu" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Tempat transaksi</label>
                                <select class="form-control form-control-sm" id="lokasi" name="lokasi">
                                    <option>Pilih lokasi</option>
                                    <option>Area kampus UCIC</option>
                                    <option>Kota Cirebon</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Keterangan Lokasi</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
                            </div>
                        </form>
                    </div>

                    <?php
                    $total_belanja = 0;
                    ?>

                    <!-- DAFTAR BELANJA -->
                    <div class="col-lg-6">
                        <h3 class="small-title">DAFTAR BELANJA</h3>
                        <div class="order-infobox">
                            <div class="checkout-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">PRODUK</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detail_keranjang as $detail) : ?>
                                            <tr>
                                                <td class="text-left"><?= $detail['nama_produk']; ?> <span>× <?= $detail['kuantitas']; ?></span></td>

                                                <!-- Hitung Total Bayar -->
                                                <?php
                                                $harga_produk = $detail['harga_produk'];
                                                $kuantitas = $detail['kuantitas'];
                                                $subtotal = $harga_produk * $kuantitas;
                                                $total_belanja = $total_belanja + $subtotal;
                                                ?>

                                                <td class="text-right">Rp<?= number_format($subtotal, 0, ',', '.'); ?></td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="total-price">
                                            <th class="text-left">TOTAL BAYAR</th>
                                            <td class="text-right">Rp<?= number_format($total_belanja, 0, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button class="ho-button ho-button-fullwidth" type="submit">
                                <span>Pembayaran</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</main>