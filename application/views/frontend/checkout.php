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
                            <label class="floating-label">Tujuan Pengiriman</label>
                            <select class="form-control" id="lokasi" name="lokasi">
                                <option value="">Pilih Lokasi</option>
                                <?php foreach ($lokasi as $l) : ?>
                                    <option data-ongkir="<?= $l['jumlah_ongkir']; ?>" value="<?= $l['id_lokasi']; ?>"><?= $l['nama_lokasi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="validasi_lokasi" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label class="floating-label">Alamat / Kecamatan</label>
                            <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                            <small id="validasi_alamat" class="text-danger"></small>
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
                                <?php for ($i = 0; $i < count($list_penjual); $i++) { ?>

                                    <h6>NAMA PENJUAL : <?php echo $list_penjual[$i]['nama_mahasiswa']; ?></h6>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left">PRODUK</th>
                                                <th class="text-right">TOTAL</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php for ($k = 0; $k < count($detail_keranjang); $k++) {

                                                if ($detail_keranjang[$k]['id_mahasiswa'] == $list_penjual[$i]['id_mahasiswa']) {

                                            ?>
                                                    <tr>
                                                        <td class="text-left"><?= $detail_keranjang[$k]['nama_produk']; ?> <span>× <?= $detail_keranjang[$k]['kuantitas']; ?></span></td>

                                                        <!-- Hitung Total Bayar -->
                                                        <?php
                                                        $harga_produk = $detail_keranjang[$k]['harga_produk'];
                                                        $kuantitas = $detail_keranjang[$k]['kuantitas'];
                                                        $subtotal = $harga_produk * $kuantitas;
                                                        $total_belanja = $total_belanja + $subtotal;
                                                        ?>

                                                        <td class="text-right">Rp<?= number_format($subtotal, 0, ',', '.'); ?></td>
                                                    </tr>
                                                <?php } ?>

                                            <?php  }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-left">ONGKOS KIRIM</th>
                                                <td class="text-right">
                                                    Rp<span id="ongkir"></span>
                                                </td>
                                            </tr>
                                        </tfoot>

                                    </table>

                                <?php } ?>


                                <span id="total_belanja" style="display: none;"><?= $total_belanja; ?></span>
                                <span id="total_penjual" style="display: none;"><?= count($list_penjual); ?></span>
                                <input type="hidden" name="total_belanja">
                                <input type="hidden" name="jumlah_ongkir">
                            </div>

                            <table class="table">
                                <tfoot>
                                    <tr class=" total-price">
                                        <th class="text-left">TOTAL BAYAR</th>
                                        <td class="text-right">Rp<span id="total_bayar"></span> </td>
                                    </tr>
                                </tfoot>
                            </table>

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