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
            <div class="col-xl-3 col-md-6">
                <a href="<?= site_url('pesanan/daftar_pesanan_penjual'); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="icon fas fa-cart-plus f-30 text-c-purple"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Pesanan</h6>
                                    <h2 class="m-b-0">2</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="<?= site_url('produk/data_produk'); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-auto">
                                    <i class="icon fas fa-dice-d6 f-30 text-c-green"></i>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-muted m-b-10">Produk</h6>
                                    <h2 class="m-b-0"><?= $jumlahproduk; ?></h2>
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
                                <i class="icon fas fa-truck f-30 text-c-yellow"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Dikirim</h6>
                                <h2 class="m-b-0">1</h2>
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
                                <i class="icon fas fa-paper-plane f-30 text-c-blue"></i>
                            </div>
                            <div class="col-auto">
                                <h6 class="text-muted m-b-10">Produk Terjual</h6>
                                <h2 class="m-b-0">10</h2>
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
                            <table id="simpletable" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Tanggal & Waktu</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Jumlah Bayar</th>
                                        <th class="text-center">Status</th>
                                        <th width="8%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle text-center"></td>
                                        <td class="align-middle text-center">
                                            <a href="" class="btn btn-sm btn-info rounded"><i class="feather icon-eye"></i> Detail</a>
                                        </td>
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