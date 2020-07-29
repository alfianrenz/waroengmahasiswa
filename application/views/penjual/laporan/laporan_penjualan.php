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
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Penjualan Saya</h6>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="3%">No</th>
                                        <th class="text-center">Tanggal & Waktu</th>
                                        <th class="text-center">Foto</th>
                                        <th>Nama Produk</th>
                                        <th class="text-center">Harga Produk</th>
                                        <th class="text-center">Jumlah Terjual</th>
                                        <th class="text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- No -->
                                        <td class="text-center align-middle"></td>

                                        <!-- Foto Produk -->
                                        <td class="align-middle text-center">
                                            <img src="<?= base_url('upload/foto_produk'); ?>" alt="contact-img" title="contact-img" class="rounded mr-3" height="48" width="48" style="object-fit: cover">
                                        </td>

                                        <!-- Nama Produk -->
                                        <td class="align-middle"></td>

                                        <!-- Harga Produk -->
                                        <td class="align-middle text-center"></td>

                                        <!-- Jumlah Terjual -->
                                        <td class="align-middle"></td>

                                        <!-- Subtotal -->
                                        <td class="align-middle text-center"></td>

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