<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard/penjual'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-blue">2</h4>
                                <h6 class="text-muted m-b-0">Pesanan Masuk</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cart-plus f-28 text-c-blue"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-red">3</h4>
                                <h6 class="text-muted m-b-0">Belum Bayar</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-dollar-sign f-28 text-c-red"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-yellow">3</h4>
                                <h6 class="text-muted m-b-0">Dikirim</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-truck f-28 text-c-yellow"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-green">Rp20.000</h4>
                                <h6 class="text-muted m-b-0">Saldo Saya</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-dollar-sign f-28 text-c-green"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Pesanan</h6>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Metode Pembayaran</th>
                                        <th class="text-center">Tanggal & Waktu</th>
                                        <th>Nama Pelanggan</th>
                                        <th class="text-center">Status</th>
                                        <th width="8%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) : ?>
                                        <tr>
                                            <!-- Order -->
                                            <td class="text-center align-middle"><?= $t['order_id']; ?></td>

                                            <!-- Metode Pembayaran -->
                                            <td class="align-middle text-center">
                                                <?php if ($t['tipe_pembayaran'] == 'gopay') { ?>
                                                    <span>GO-PAY</span>
                                                <?php } ?>

                                                <?php if ($t['tipe_pembayaran'] == 'cstore') { ?>
                                                    <?php if ($t['store'] == 'alfamart') { ?>
                                                        <span>Alfamart</span>
                                                    <?php } else { ?>
                                                        <span>Indomaret</span>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if ($t['tipe_pembayaran'] == 'bank_transfer') { ?>
                                                    <span>Bank Transfer</span>
                                                <?php } ?>
                                            </td>

                                            <!-- Waktu Transaksi -->
                                            <td class="align-middle text-center"><?= $t['waktu_transaksi']; ?></td>

                                            <!-- Nama Pelanggan -->
                                            <td class="align-middle"><?= $t['nama_pelanggan']; ?></td>

                                            <!-- Status Pesanan -->
                                            <td class="align-middle text-center">
                                                <?php if ($t['status_pesanan'] == 'Belum Bayar') { ?>
                                                    <span class="badge badge-warning">Belum Bayar</span>
                                                <?php } else if ($t['status_pesanan'] == 'Diproses') { ?>
                                                    <span class="badge badge-primary">Diproses</span>
                                                <?php } else if ($t['status_pesanan'] == 'Dikirim') { ?>
                                                    <span class="badge badge-secondary">Dikirim</span>
                                                <?php } else if ($t['status_pesanan'] == 'Selesai') { ?>
                                                    <span class="badge badge-success">Selesai</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Batal</span>
                                                <?php } ?>
                                            </td>

                                            <!-- Button Detail -->
                                            <td class="align-middle text-center">
                                                <a href="<?= site_url('pesanan/detail_pesanan_penjual/' . $t['order_id']); ?>" class="btn btn-sm btn-info rounded"><i class="feather icon-eye"></i> Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>