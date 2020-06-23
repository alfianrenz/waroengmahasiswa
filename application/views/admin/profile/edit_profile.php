<div class="pcoded-main-container">
    <div class="pcoded-content">

        <!-- Profil user card -->
        <div class="user-profile user-card mb-4">
            <div class="card-body py-0">
                <div class="user-about-block m-0">
                    <div class="row">
                        <div class="col-md-4 text-center mt-n5">
                            <div class="change-profile text-center">
                                <div class="dropdown w-auto d-inline-block">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="profile-dp">
                                            <div class="position-relative d-inline-block">
                                                <img class="img-radius img-fluid wid-100" src="<?= base_url('upload/foto_user/' . $session['foto_admin']); ?>" alt="User image">
                                            </div>
                                        </div>
                                        <div class="certificated-badge">
                                            <i class="fas fa-certificate text-c-blue bg-icon"></i>
                                            <i class="fas fa-check front-icon text-white"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <h5 class="mb-1"><?= $session['nama_admin']; ?></h5>
                            <p class="mb-2 text-muted">Administrator</p>
                        </div>
                        <div class="col-md-8 mt-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="http://bkmcic.com" class="mb-1 text-muted d-flex align-items-end text-h-primary" target="blank"><i class="feather icon-globe mr-2 f-18"></i>www.bkmcic.com</a>
                                    <div class="clearfix"></div>
                                    <a href="#!" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-mail mr-2 f-18"></i><?= $session['email_admin']; ?></a>
                                    <div class="clearfix"></div>
                                    <a href="#!" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-phone mr-2 f-18"></i>081214674264</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <i class="feather icon-map-pin mr-2 mt-1 f-18 text-muted"></i>
                                        <div class="media-body">
                                            <p class="mb-0 text-muted">Universitas Catur Insan Cendekia</p>
                                            <p class="mb-0 text-muted">Jalan Kesambi, No. 202</p>
                                            <p class="mb-0 text-muted">Kota Cirebon</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>

        <form action="<?= site_url('profile/edit_profile_admin'); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $admin['id_admin']; ?>">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="<?= base_url('upload/foto_user/' . $admin['foto_admin']); ?>" width="142px" height="142px" class="img-fluid img-radius" style="object-fit: cover; margin-top:25px; margin-bottom:19px" id="image-field">

                            <!-- Custom Input File -->
                            <input type="file" id="foto" name="foto" style="visibility: hidden" onchange="previewImage(event)">
                            <button type="button" class="btn btn-outline-primary col-sm-12" onclick="document.getElementById('foto').click()"><i class="feather icon-camera"></i>&nbsp;&nbsp; Ubah Foto</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mt-1">Edit Profile</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama" value="<?= $admin['nama_admin']; ?>">
                                    <?= form_error('nama', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label col-form-label-sm">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Username" value="<?= $admin['username_admin']; ?>">
                                    <?= form_error('username', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Email" value="<?= $admin['email_admin']; ?>">
                                    <?= form_error('email', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mt-4 mb-0">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-5">
                                    <a href="<?= site_url('profile/index'); ?>" class="btn btn-secondary"><i class="feather icon-rotate-ccw"></i>&nbsp;&nbsp;Kembali </a>
                                    <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i>&nbsp;&nbsp;Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>