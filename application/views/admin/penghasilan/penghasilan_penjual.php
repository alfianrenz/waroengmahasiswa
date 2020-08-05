<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Penghasilan Penjual</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Penghasilan Penjual</a></li>
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
                        <h5>Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">NIM</th>
                                        <th class="text-center">Nama Mahasiswa</th>
                                        <th class="text-center">Program Studi</th>
                                        <th class="text-center">Telepon</th>
                                        <th class="text-center">Penghasilan</th>
                                        <th width="8%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total_penghasilan = 0;
                                    foreach ($penghasilan as $p) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $no++; ?></td>
                                            <td class="align-middle text-center">
                                                <img src="<?= base_url('upload/foto_user/' . $p['foto_mahasiswa']); ?>" alt="contact-img" title="contact-img" class="img-radius mr-3" height="48" width="48" style="object-fit: cover">
                                            </td>
                                            <td class="align-middle"><?= $p['nim']; ?></td>
                                            <td class="align-middle"><?= $p['nama_mahasiswa']; ?></td>
                                            <td class="align-middle"><?= $p['nama_prodi']; ?></td>
                                            <td class="align-middle"><?= $p['telepon_mahasiswa']; ?></td>

                                            <td class="align-middle text-center">Rp<?= number_format($p['total_penghasilan'], 0, ',', '.'); ?></td>
                                            <td class="align-middle text-center">
                                                <a href="<?= site_url('akun/detail_akun_mahasiswa'); ?>/<?= $p['id_mahasiswa']; ?>" class="btn btn-sm btn-info rounded"><i class="feather icon-eye"></i> Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>