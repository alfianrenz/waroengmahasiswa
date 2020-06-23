<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('home'); ?>">Beranda</a></li>
                <li>Login Mahasiswa</li>
            </ul>
        </div>
    </div>
</div>

<!-- Page Conttent -->
<main class="page-content">

    <!-- My Account Page -->
    <div class="my-account-area ptb-30">
        <div class="container">
            <h2>LOGIN MAHASISWA</h2>
            <br>
            <div class="row">

                <!-- Images  -->
                <div class="col-lg-6">
                    <img src="<?= base_url(); ?>assets/frontend/images/others/login_mahasiswa.png" alt="">
                </div>

                <!-- Form Login -->
                <div class="col-lg-6 mt-30 mt-lg-0">
                    <?= $this->session->userdata('message'); ?>
                    <div class="login-form-wrapper">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?= site_url('auth/login_mahasiswa'); ?>" method="POST">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-form-label col-form-label-sm">Nomor Induk Mahasiswa</label>
                                        <input type="text" class="form-control form-control-sm" id="nim" name="nim" placeholder="" value="">
                                        <?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-form-label col-form-label-sm">Password</label>
                                        <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="" value="">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="col-sm-12 ho-button mt-2"><span>Masuk</span></button>
                                        <div class="text-center mt-3">
                                            <a href="#" class="text-dark">Lupa Password</a>
                                        </div>
                                        <div class="text-center">
                                            <a href="<?= site_url('auth/buat_akun_mahasiswa'); ?>" class="text-dark">Buat Akun</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>