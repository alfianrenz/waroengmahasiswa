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
    <div class="checkout-area bg-white ptb-30">
        <div class="container">

            <form id="checkout">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="small-title">PENERIMA</h3>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:&nbsp;&nbsp; <?= $this->session->userdata('nama'); ?></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>:&nbsp;&nbsp; <?= $this->session->userdata('telepon'); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:&nbsp;&nbsp; <?= $this->session->userdata('email'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <h3 class="small-title mt-30">PENGIRIMAN</h3>
                        <div class="form-group">
                            <label class="floating-label">Kabupaten / Kota</label>
                            <input type="text" class="form-control form-control-sm" id="kota" name="kota" value="<?= set_value('kota'); ?>">
                            <small id="validasi_kota" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label class="floating-label">Alamat Lengkap</label>
                            <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                            <small id="validasi_alamat" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label class="floating-label">Kode Pos</label>
                            <input type="text" class="form-control form-control-sm" id="kode_pos" name="kode_pos" value="<?= set_value('kode_pos'); ?>">
                            <small id="validasi_kode_pos" class="text-danger"></small>
                        </div>
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
                                <span>Bayar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>