<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Slider</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Slider</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->session->userdata('message'); ?>

        <!-- Main Content -->
        <form action="<?= site_url('website/tambah_slider'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mt-1">Tambah Slider</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-form-label col-form-label-sm">Foto Slider <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-form-label col-form-label-sm">Keterangan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" value="<?= set_value('keterangan'); ?>">
                                <?= form_error('keterangan', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-form-label col-form-label-sm">Jadikan Foto Awal <span class="text-danger">*</span></label>
                                <select class="form-control" name="status">
                                    <option value="0">Tidak</option>
                                    <option value="1">Iya</option>
                                </select>
                            </div>
                            <div class="form-group mt-4 mb-0">
                                <button type="submit" class="btn btn-primary float-right"><i class="feather icon-save"></i>&nbsp;&nbsp;Simpan</button>
                                <a href="<?= site_url('website/data_slider'); ?>" class="btn btn-secondary float-right mr-1"><i class="feather icon-rotate-ccw"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>