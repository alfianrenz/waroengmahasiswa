<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                <li>Keranjang</li>
            </ul>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="page-content">
    <div class="cart-page-area ptb-30 bg-white">
        <div class="container">

            <!-- Keranjang Belanja -->
            <div class="dt-responsive table-responsive">
                <table id="simpletable" class="table table-de nowrap">
                    <thead>
                        <tr>
                            <th width="10%" class="text-center">Foto</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Harga Satuan</th>
                            <th class="text-center">Kuantitas</th>
                            <th class="text-center">Total Harga</th>
                            <th width="8%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center">
                                <img src="<?= base_url('upload/foto_produk/Seblak_Instan_Mommy.jpg'); ?>" alt="contact-img" title="contact-img" class="rounded" height="60" width="60" style="object-fit: cover">
                            </td>
                            <td class="align-middle text-center">Seblak Instan Mommy</td>
                            <td class="align-middle text-center">Rp 10.000</td>
                            <td class="align-middle text-center">2</td>
                            <td class="align-middle text-center">Rp 20.000</td>
                            <td class="align-middle text-center">
                                <a href="" class="btn btn-sm btn-secondary rounded tombol-hapus text-white"><i class="lnr lnr-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Kontent Keranjang -->
            <div class="cart-content">
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="cart-content-left">
                            <div class="ho-buttongroup">
                                <a href="" class="ho-button ho-button-sm">
                                    <span>Kosongkan Keranjang</span>
                                </a>
                                <a href="<?= site_url('produk/data_produk_frontend'); ?>" class="ho-button ho-button-sm">
                                    <span>Lanjutkan Belanja</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="cart-content-right">
                            <h4>TOTAL BELANJA</h4>
                            <h1 class="text-primary">Rp 0</h1>
                            <a href="<?= site_url('checkout/halaman_checkout'); ?>" class="ho-button">
                                <span>Checkout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>