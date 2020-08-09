<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Konfirmasi Pengiriman</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard/penjual'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Konfirmasi Pengiriman</a></li>
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
                        <h6 class="mb-0">Konfirmasi Pengiriman</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label col-form-label-sm">Jasa Pengiriman</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Masukkan Nama Produk" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label col-form-label-sm">Jasa Pengiriman</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Masukkan Nama Produk" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>