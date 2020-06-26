<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard/penjual'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Produk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->session->userdata('message'); ?>

        <!-- Main Content -->
        <form action="<?= site_url('produk/tambah_produk'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12">

                    <!-- Foto Produk -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Foto Produk</h5>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>

                    <!-- Detail Produk -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Detail Produk</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label col-form-label-sm">Nama Produk</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Masukkan Nama Produk">
                                    <?= form_error('nama', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label col-form-label-sm">Kategori Produk</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" name="kategori">
                                        <option>Pilih Kategori</option>
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label col-form-label-sm">Harga Produk</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="harga" name="harga" placeholder="Masukkan Harga Produk (10.000)">
                                    <?= form_error('harga', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label col-form-label-sm">Stok Produk</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control form-control-sm" id="stok" name="stok" placeholder="Masukkan Stok Produk (0)">
                                    <?= form_error('stok', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label col-form-label-sm">Deskripsi Produk</label>
                                <div class="col-sm-9">
                                    <textarea class="ckeditor" name="dekskripsi"></textarea>
                                    <?= form_error('deskripsi', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <a href="<?= site_url('produk/data_produk'); ?>" class="btn btn-secondary"><i class="feather icon-rotate-ccw"></i>&nbsp;&nbsp;Kembali </a>
                                    <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i>
                                        &nbsp;&nbsp;Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>