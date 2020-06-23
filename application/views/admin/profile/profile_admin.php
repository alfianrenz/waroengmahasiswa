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

        <?= $this->session->userdata('message'); ?>

        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mt-1">Profile</h5>
                        <div class="card-header-right">
                            <a href="<?= site_url('profile/edit_profile_admin'); ?>" class="btn waves-effect waves-light btn-primary">
                                <i class="feather icon-edit"></i>
                                &nbsp;Edit Profile
                            </a>
                            <a href="<?= site_url('profile/ubah_password_admin'); ?>" class="btn waves-effect waves-light btn-info">
                                <i class="feather icon-unlock"></i>
                                &nbsp;Ubah Password
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless">
                                <tbody>
                                    <tr>
                                        <td width="30%">Nama</td>
                                        <td>:&nbsp;&nbsp; <?= $admin['nama_admin']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:&nbsp;&nbsp; <?= $admin['username_admin']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:&nbsp;&nbsp; <?= $admin['email_admin']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>:&nbsp;&nbsp; administrator</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="thumbnail">
                            <div class="thumb">
                                <a href="<?= base_url('upload/foto_user/' . $admin['foto_admin']); ?>" data-lightbox="1">
                                    <img src="<?= base_url('upload/foto_user/' . $admin['foto_admin']); ?>" alt="" class="img-fluid img-radius" width="142px" style="object-fit: cover; margin-top:15px">
                                </a>
                            </div>
                        </div>
                        <h5 class="mt-4"><?= $admin['nama_admin']; ?></h5>
                        <p class="text-muted" style="margin-bottom: 10px;">Administrator</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>