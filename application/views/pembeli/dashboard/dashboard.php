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
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href="<?= site_url('pesanan/daftar_pesanan_pembeli'); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="icon feather icon-shopping-cart f-30 text-c-purple"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Pesanan Saya</h6>
                                    <h2 class="m-b-0">2</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-check-circle f-30 text-c-green"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Pesanan Selesai</h6>
                                <h2 class="m-b-0">3</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-external-link f-30 text-c-yellow"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Dikirim</h6>
                                <h2 class="m-b-0">3</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-auto">
                                <i class="icon feather icon-shopping-cart f-30 text-c-red"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Belum Bayar</h6>
                                <h2 class="m-b-0">1</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Pesanan Saya</h6>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Tipe Pembayaran</th>
                                        <th>Tanggal & Waktu</th>
                                        <th class="text-center">Total Bayar</th>
                                        <th class="text-center">Status Pesanan</th>
                                        <th width="8%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $t['order_id']; ?></td>
                                            <td class="align-middle text-center"><?= $t['tipe_pembayaran']; ?></td>
                                            <td class="align-middle"><?= $t['waktu_transaksi']; ?></td>
                                            <td class="align-middle text-center">Rp<?= number_format($t['total_bayar'], 0, ',', '.'); ?></td>
                                            <td class="align-middle text-center">
                                                <?php if ($t['status_bayar'] == 'pending') { ?>
                                                    <span class="badge badge-warning">Belum Bayar</span>
                                                <?php } else if ($t['status_bayar'] == 'cancel') { ?>
                                                    <span class="badge badge-danger">Batal</span>
                                                <?php } else if ($t['status_bayar'] == 'failure') { ?>
                                                    <span class="badge badge-secondary">Gagal</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-primary">Diproses</span>
                                                <?php } ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="" class="btn btn-sm btn-info rounded"><i class="feather icon-eye"></i> Detail</a>
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