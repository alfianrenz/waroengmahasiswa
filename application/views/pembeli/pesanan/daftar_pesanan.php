<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Pesanan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard/penjual'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Pesanan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="nav nav-pills" role="tablist">
                            <a href="" class="nav-link active">Daftar Pesanan</a>
                            <a href="" class="nav-link">Belum Bayar</a>
                            <a href="" class="nav-link">Diproses</a>
                            <a href="" class="nav-link">Dikirim</a>
                            <a href="" class="nav-link">Selesai</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Metode Pembayaran</th>
                                        <th>Tanggal & Waktu</th>
                                        <th class="text-center">Total Bayar</th>
                                        <th class="text-center">Status Pesanan</th>
                                        <th width="8%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) : ?>
                                        <tr>
                                            <!-- Order ID -->
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
                                            <td class="align-middle"><?= $t['waktu_transaksi']; ?>
                                            </td>

                                            <!-- Total Bayar -->
                                            <td class="align-middle text-center">Rp<?= number_format($t['total_bayar'], 0, ',', '.'); ?></td>

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
                                                    <span class="badge badge-danger">Gagal</span>
                                                <?php } ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="<?= site_url('pesanan/detail_pesanan_pembeli/' . $t['order_id']); ?>" class="btn btn-sm btn-info rounded"><i class="feather icon-eye"></i> Detail</a>
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