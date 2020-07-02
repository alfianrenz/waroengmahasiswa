<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Laporan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Laporan</a></li>
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
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Dari</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="dari" name="sampai">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Sampai</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="dari" name="sampai">
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
                    </div>
                </div>

                <!-- Data Laporan -->
                <div class="card">
                    <div class="card-header">
                        <h5>Laporan Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th>ID Pesanan</th>
                                        <th>Payment Type</th>
                                        <th>Tanggal & Waktu</th>
                                        <th>Email Pelanggan</th>
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