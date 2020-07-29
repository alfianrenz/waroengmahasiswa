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

        <?= $this->session->userdata('message'); ?>

        <!-- Main Content -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <a href="<?= site_url('akun/data_akun_mahasiswa'); ?>">
                    <div class="card widget-statstic-card">
                        <div class="card-body">
                            <div class="card-header-left mb-3">
                                <h5 class="mb-0">Mahasiswa</h5>
                            </div>
                            <i class="feather icon-user st-icon bg-c-purple"></i>
                            <div class="text-left">
                                <h3 class="d-inline-block text-c-purple"><?= $jumlahakunmahasiswa; ?></h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="<?= site_url('akun/data_akun_umum'); ?>">
                    <div class="card widget-statstic-card">
                        <div class="card-body">
                            <div class="card-header-left mb-3">
                                <h5 class="mb-0">Pengguna Umum</h5>
                            </div>
                            <i class="feather icon-users st-icon bg-c-red txt-lite-color"></i>
                            <div class="text-left">
                                <h3 class="d-inline-block text-c-red"><?= $jumlahakunumum; ?></h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-xl-3">
                <a href="<?= site_url('transaksi/data_transaksi/all'); ?>">
                    <div class="card widget-statstic-card">
                        <div class="card-body">
                            <div class="card-header-left mb-3">
                                <h5 class="mb-0">Transaksi</h5>
                            </div>
                            <i class="feather icon-shopping-cart st-icon bg-c-green"></i>
                            <div class="text-left">
                                <h3 class="d-inline-block text-success"><?= $jumlahtransaksi; ?></h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a href="<?= site_url('kategori'); ?>">
                    <div class="card widget-statstic-card">
                        <div class="card-body">
                            <div class="card-header-left mb-3">
                                <h5 class="mb-0">Kategori</h5>
                            </div>
                            <i class="feather icon-edit st-icon bg-c-yellow txt-lite-color"></i>
                            <div class="text-left">
                                <h3 class="d-inline-block text-c-yellow"><?= $jumlahkategori; ?></h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Data Transaksi -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Data Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th class="text-center">Metode Pembayaran</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal & Waktu</th>
                                        <th class="text-center">Total Bayar</th>
                                        <th class="text-center">Status Bayar</th>
                                        <th width="8%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $t) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $t['order_id']; ?></td>
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
                                            <td class="align-middle"><?= $t['nama_pelanggan']; ?></td>
                                            <td class="align-middle"><?= $t['waktu_transaksi']; ?></td>
                                            <td class="align-middle text-center">Rp<?= number_format($t['total_bayar'], 0, ',', '.'); ?></td>
                                            <td class="align-middle text-center">
                                                <?php if ($t['status_bayar'] == 'pending') { ?>
                                                    <span class="badge badge-warning">Pending</span>
                                                <?php } else if ($t['status_bayar'] == 'expire') { ?>
                                                    <span class="badge badge-danger">Failure</span>
                                                <?php } else if ($t['status_bayar'] == 'settlement') { ?>
                                                    <span class="badge badge-success">Settlement</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Cancel</span>
                                                <?php } ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="<?= site_url('transaksi/detail_transaksi/' . $t['order_id']); ?>" class="btn btn-sm btn-info rounded"><i class="feather icon-eye"></i> Detail</a>
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