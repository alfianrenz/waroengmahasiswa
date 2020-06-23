<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <!-- title -->
    <title><?= $title; ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url(); ?>assets/backend/images/logo/favicon-warma-blue.png" type="image/x-icon">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/css/style.css">
</head>

<!-- Content-->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="text-center">
            <img src="<?= base_url(); ?>assets/backend/images/logo/warma-admin-white.png" alt="" class="img-fluid mb-5" width="115px">
        </div>
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="mb-2" style="font-size: 19px">Login Administrator</h4>
                        <p class="text-muted mb-5">Akses untuk kelola Marketplace</p>

                        <?= $this->session->userdata('message'); ?>

                        <form id="validation-form123" action="<?= site_url('auth'); ?>" method="POST" class="text-left">
                            <div class="form-group mb-3">
                                <label class="floating-label">Email / Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="">
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="">
                            </div>
                            <button class="btn btn-block btn-primary mb-4 font-weight-bold" type="submit">Login</button>
                        </form>
                        <p class="text-muted mb-0"><a href="<?= site_url('auth/lupa_password_admin'); ?>">Lupa Password</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required Js -->
<script src="<?= base_url(); ?>assets/backend/js/vendor-all.min.js"></script>
<script src="<?= base_url(); ?>assets/backend/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/backend/js/ripple.js"></script>
<script src="<?= base_url(); ?>assets/backend/js/pcoded.min.js"></script>

<!-- Form Validation Js -->
<script src="<?= base_url(); ?>assets/backend/js/plugins/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/backend/js/pages/form-validation.js"></script>

<!-- Sweet Alert Js -->
<script src="<?= base_url(); ?>assets/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert/script_sweetalert.js"></script>

</body>

</html>