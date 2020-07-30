<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Laporan Penjualan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard/penjual'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Laporan Penjualan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-sm-12">

                <!-- Filter Data -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Filter Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('laporan/laporan_penjualan'); ?>" method="GET">
                            <div class="row mx-auto">
                                <div class="col-sm-5">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Awal</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Akhir</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>

                <!-- Tabel Laporan -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Hasil Laporan</h6>
                        <div class="card-header-right">
                            <form method="GET" target="_blank" action="<?php echo site_url('laporan/print_laporan_penjualan') ?>">
                                <input type="hidden" name="tgl_awal" value="<?= $tgl_awal; ?>">
                                <input type="hidden" name="tgl_akhir" value="<?= $tgl_akhir; ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather icon-printer"></i>&nbsp;&nbsp; Print
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="3%">Order ID</th>
                                        <th class="text-center">Tanggal & Waktu</th>
                                        <th class="text-center">Metode Pembayaran</th>
                                        <th class="text-center">Nama Pelanggan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Total Bayar</th>

                                        <!-- <th class="text-center">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $total_pendapatan = 0;
                                    ?>
                                    <?php if (count($transaksi) > 0) : ?>
                                        <?php foreach ($transaksi as $t) : ?>
                                            <tr>
                                                <!-- No -->
                                                <td class="text-center align-middle"><?= $t['order_id']; ?></td>

                                                <!-- Waktu Transaksi -->
                                                <td class="align-middle text-center"><?= $t['waktu_transaksi']; ?></td>

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

                                                <!-- Nama Pelanggan -->
                                                <td class="align-middle text-center"><?= $t['nama_pelanggan']; ?></td>

                                                <!-- Status -->
                                                <td class="align-middle text-center">
                                                    <?php if ($t['status_pesanan'] == 'Belum Bayar') { ?>
                                                        <span class="badge badge-warning">Belum Bayar</span>
                                                    <?php } else if ($t['status_pesanan'] == 'Diproses') { ?>
                                                        <span class="badge badge-primary">Diproses</span>
                                                    <?php } else if ($t['status_pesanan'] == 'Dikirim') { ?>
                                                        <span class="badge badge-info">Dikirim</span>
                                                    <?php } else if ($t['status_pesanan'] == 'Selesai') { ?>
                                                        <span class="badge badge-success">Selesai</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger">Batal</span>
                                                    <?php } ?>
                                                </td>

                                                <!-- Total Bayar -->
                                                <td class="align-middle text-center">Rp<?= number_format($t['total_bayar'], 0, ',', '.'); ?></td>

                                            </tr>

                                            <?php
                                            $total_pendapatan = $total_pendapatan + $t['total_bayar'];
                                            ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <tr>
                                        <td class="font-weight-bold text-right" colspan="5" style="background-color: #ecf0f5; font-size:13px; font-weight:bold">TOTAL PENDAPATAN</td>
                                        <td class="text-center font-weight-bold" style="background-color: #ecf0f5;">Rp<?= number_format($total_pendapatan, 0, ',', '.'); ?></td>
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