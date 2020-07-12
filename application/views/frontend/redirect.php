<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                <li>Status Pesanan</li>
            </ul>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="page-content">
    <div class="shop-page-area bg-white ptb-30">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="text-center">
                        <img src="<?= base_url(); ?>assets/frontend/images/logo/logo-warma-blue.png" alt="" width="200px" class="mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless mb-0" style="border-style: none;">
                                        <tbody>
                                            <tr>
                                                <td>Kode Pembayaran</td>
                                                <td>:&nbsp;&nbsp;<?= $data->payment_code; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Pesanan</td>
                                                <td>:&nbsp;&nbsp;<?= $data->transaction_status; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Metode Pembayaran</td>
                                                <td>:&nbsp;&nbsp;<?= $data->payment_type; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Pembayaran</td>
                                                <td>:&nbsp;&nbsp;<?= $data->gross_amount; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <a href="" class="ho-button col-sm-12 mt-3 text-white mb-30">Lihat Pesanan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>