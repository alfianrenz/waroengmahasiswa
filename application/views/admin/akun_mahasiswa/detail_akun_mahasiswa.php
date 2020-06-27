<div class="pcoded-main-container">
    <div class="pcoded-content">

        <!-- Breadcumb -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Detail</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="nav nav-pills" role="tablist">
                            <a href="<?= site_url('akun/detail_akun_mahasiswa'); ?>/<?= $mahasiswa['id_mahasiswa']; ?>" class="nav-link active">Detail Mahasiswa</a>
                            <a href="<?= site_url('akun/detail_produk_mahasiswa'); ?>/<?= $mahasiswa['id_mahasiswa']; ?>" class="nav-link">Detail Produk</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td>Nomor Induk Mahasiswa</td>
                                        <td>:&nbsp;&nbsp; <?= $mahasiswa['nim']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Mahasiswa</td>
                                        <td>:&nbsp;&nbsp; <?= $mahasiswa['nama_mahasiswa']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fakultas</td>
                                        <td>:&nbsp;&nbsp; <?= $mahasiswa['nama_fakultas']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Program Studi</td>
                                        <td>:&nbsp;&nbsp; <?= $mahasiswa['nama_prodi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:&nbsp;&nbsp; <?= $mahasiswa['email_mahasiswa']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>:&nbsp;&nbsp; <?= $mahasiswa['telepon_mahasiswa']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:&nbsp;&nbsp; <?= $mahasiswa['alamat_mahasiswa']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Daftar</td>
                                        <td>:&nbsp;&nbsp; <?= $mahasiswa['tanggal_daftar']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:&nbsp;&nbsp;
                                            <?php if ($mahasiswa['status_aktif'] == 1) { ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            <?php } ?>
                                        </td>
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
                                <a href="<?= base_url('upload/foto_user/' . $mahasiswa['foto_mahasiswa']); ?>" data-lightbox="1">
                                    <img src="<?= base_url('upload/foto_user/' . $mahasiswa['foto_mahasiswa']); ?>" alt="" class="img-fluid img-radius" width="142px" style="object-fit: cover; margin-top:15px">
                                </a>
                            </div>
                        </div>
                        <h5 class="mt-4"><?= $mahasiswa['nama_mahasiswa']; ?></h5>
                        <p class="text-muted" style="margin-bottom: 10px;"><?= $mahasiswa['email_mahasiswa']; ?></p>
                    </div>
                </div>
                <a href="<?= site_url('akun/data_akun_mahasiswa'); ?>" class="btn btn-primary col-sm-12"><i class="feather icon-rotate-ccw"></i>&nbsp;&nbsp;Kembali</a>
            </div>
        </div>
    </div>
</div>