<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Laporan Transaksi</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Laporan Transaksi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-sm-12">

                <!-- Filter -->
                <div class="card">
                    <div class="card-header">
                        <h5>Filter Data</h5>
                    </div>

                    <!-- <div class="card-body">
                        <form action="<?= site_url('laporan/laporan_transaksi'); ?>" method="POST">
                            <div class="row mx-auto">
                                <div class="col-sm-5">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Dari</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Sampai</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->

                    <div class="card-body">
                        <form action="<?= site_url('laporan/laporan_transaksi'); ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-9 mx-auto">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Filter Berdasarkan</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" id="status" name="status">
                                                <option>Status Pembayaran</option>
                                                <option value="settlement"> Settlement</option>
                                                <option value="pending"> Pending</option>
                                                <option value="expire"> Failure</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary"><i class="feather icon-search"></i>&nbsp;&nbsp;Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Data Laporan -->
                <div class="card">
                    <div class="card-header">
                        <h5>Hasil Laporan</h5>
                        <div class="card-header-right">
                            <form method="POST" target="_blank" action="<?php echo site_url('laporan/print_laporan_transaksi/') ?>">
                                <input type="hidden" name="filter" value="<?= $filter ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather icon-printer"></i>&nbsp;&nbsp; Print
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Metode Pembayaran</th>
                                        <th>Nama Pelanggan</th>
                                        <th class="text-center">Tanggal & Waktu</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Status</th>
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
                                            <td class="align-middle text-center"><?= $t['waktu_transaksi']; ?></td>
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