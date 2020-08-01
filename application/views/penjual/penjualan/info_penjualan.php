<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Info Penjualan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard/penjual'); ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Info Penghasilan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-c-white text-white widget-visitor-card">
                    <div class="card-body text-center">
                        <h2 class="text-primary">Rp<?= number_format($penghasilan, 0, ',', '.'); ?></h2>
                        <h6 class="text-dark">Penghasilan Saya</h6>
                        <i class="feather icon-file-text text-primary"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?= base_url(); ?>assets/frontend/images/others/contact.png" alt="" width="250px" class="mb-4">
                            <p>Untuk Informasi lebih lanjut mengenai penarikan dana, silahkan menghubungi administrator</p>
                            <a href="https://api.whatsapp.com/send?phone=<?= $website['telepon']; ?>" class="btn btn-primary" target="_blank"><i class="feather icon-phone"></i>&nbsp;&nbsp;Hubungi Admin</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Rincian Penjualan</h6>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-de nowrap">
                                <thead>
                                    <tr>
                                        <th width="5%" class="text-center">Foto</th>
                                        <th>Nama Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Terjual</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($produk as $p) : ?>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <img src="<?= base_url('upload/foto_produk/' . $p['foto_produk']); ?>" alt="contact-img" title="contact-img" class="rounded mr-3" height="48" width="48" style="object-fit: cover">
                                            </td>

                                            <td class="align-middle">
                                                <?= $p['nama_produk']; ?>
                                            </td>

                                            <td class="text-center align-middle">Rp<?= number_format($p['harga_produk'], 0, ',', '.'); ?></td>
                                            <td class="text-center align-middle"></td>
                                            <td class="text-center align-middle"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td class="font-weight-bold" colspan="4">Total Penghasilan</td>
                                        <td class="text-center font-weight-bold">Rp</td>
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