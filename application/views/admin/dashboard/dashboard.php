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
            <div class="col-xl-3 col-md-6">
                <a href="<?= site_url('akun/data_akun_mahasiswa'); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="icon feather icon-users f-30 text-c-purple"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Mahasiswa</h6>
                                    <h2 class="m-b-0"><?= $jumlahakunmahasiswa; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="<?= site_url('akun/data_akun_umum'); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="icon feather icon-users f-30 text-c-yellow"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Pengguna Umum</h6>
                                    <h2 class="m-b-0"><?= $jumlahakunumum; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="<?= site_url('transaksi/data_transaksi'); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="icon feather icon-download f-30 text-c-green"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Transaksi</h6>
                                    <h2 class="m-b-0"><?= $jumlahtransaksi; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="<?= site_url('kategori'); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="icon feather icon-edit f-30 text-c-blue"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Kategori</h6>
                                    <h2 class="m-b-0"><?= $jumlahkategori; ?></h2>
                                </div>
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
                            <table id="simpletable" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th class="text-center">Tipe Pembayaran</th>
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
                                            <td class="align-middle text-center"><?= $t['tipe_pembayaran']; ?></td>
                                            <td class="align-middle"><?= $t['nama_pelanggan']; ?></td>
                                            <td class="align-middle"><?= $t['waktu_transaksi']; ?></td>
                                            <td class="align-middle text-center">Rp<?= number_format($t['total_bayar'], 0, ',', '.'); ?></td>
                                            <td class="align-middle text-center">
                                                <?php if ($t['status_bayar'] == 'pending') { ?>
                                                    <span class="badge badge-warning">Pending</span>
                                                <?php } else if ($t['status_bayar'] == 'cancel') { ?>
                                                    <span class="badge badge-danger">Cancel</span>
                                                <?php } else if ($t['status_bayar'] == 'failure') { ?>
                                                    <span class="badge badge-secondary">Gagal</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-success">Settlement</span>
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