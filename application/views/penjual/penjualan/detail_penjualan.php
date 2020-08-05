<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Detail Penjualan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail Penjualan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Nama Produk</h6>
                    </div>

                    <?php foreach ($penjualan as $p) : ?>
                    <?php endforeach; ?>

                    <div class="card-body">
                        <img src="<?= base_url('upload/foto_produk/' . $p['foto_produk']); ?>" width="300px" class="img-fluid" style="object-fit: cover" id="image-field">
                        <div class="text-center mt-3">
                            <h5><?= $p['nama_produk']; ?></h5>
                            <p class="mb-0"><?= $p['nama_kategori']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Detail Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Metode Pembayaran</th>
                                        <th class="text-center">Tanggal dan Waktu</th>
                                        <th class="text-center">Nama Pelanggan</th>
                                        <th class="text-center">Kuantitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_penjualan = 0;
                                    foreach ($penjualan as $p) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $p['order_id']; ?></td>
                                            <td class="align-middle text-center">
                                                <?php if ($p['tipe_pembayaran'] == 'gopay') { ?>
                                                    <span>GO-PAY</span>
                                                <?php } ?>

                                                <?php if ($p['tipe_pembayaran'] == 'cstore') { ?>
                                                    <?php if ($p['store'] == 'alfamart') { ?>
                                                        <span>Alfamart</span>
                                                    <?php } else { ?>
                                                        <span>Indomaret</span>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if ($p['tipe_pembayaran'] == 'bank_transfer') { ?>
                                                    <span>Bank Transfer</span>
                                                <?php } ?>
                                            </td>
                                            <td class="align-middle text-center"><?= $p['waktu_transaksi']; ?></td>
                                            <td class="align-middle text-center"><?= $p['nama_pelanggan']; ?></td>
                                            <td class="align-middle text-center"><?= $p['kuantitas']; ?></td>
                                        </tr>

                                        <?php
                                        $total_penjualan = $total_penjualan + $p['kuantitas'];
                                        ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td class="font-weight-bold" colspan="4" style="background-color: #ecf0f5; text-align:center">TOTAL PENJUALAN</td>
                                        <td class="text-center font-weight-bold" style="background-color: #ecf0f5;"><?= $total_penjualan; ?></td>
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