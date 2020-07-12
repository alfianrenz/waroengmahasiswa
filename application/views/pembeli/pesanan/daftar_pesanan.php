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
                                        <th>Order ID</th>
                                        <th>Tipe Pembayaran</th>
                                        <th>Tanggal & Waktu</th>
                                        <th>Total Bayar</th>
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
                                                <?php if ($transaksi['status_bayar'] == 'pending') { ?>
                                                    <span class="badge badge-warning">Belum Bayar</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-primary">Dikirim</span>
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