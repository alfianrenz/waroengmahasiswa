<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="page-content">

    <!-- Shop Page Area -->
    <div class="checkout-area bg-white pb-30">
        <div class="container">

            <form action="#" class="billing-info">
                <div class="row">
                    <!-- Alamat Pengiriman -->
                    <div class="col-lg-6">
                        <h3 class="small-title">DETAIL PENERIMA</h3>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td>Nama Penerima</td>
                                    <td>:&nbsp;&nbsp; Alfian</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>:&nbsp;&nbsp; 6281214674264</td>
                                </tr>
                                <tr>
                                    <td>Email Penerima</td>
                                    <td>:&nbsp;&nbsp; alfianrenz25@gmail.com</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3 class="small-title mt-30">ALAMAT PENGIRIMAN</h3>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="floating-label">Provinsi</label>
                                <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Kabupaten</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Kecamatan</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="">
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label">Desa/Nama Jalan/RT/RW</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="">
                            </div>
                        </form>
                    </div>

                    <!-- DAFTAR BELANJA -->
                    <div class="col-lg-6">
                        <h3 class="small-title">RINGKASAN BELANJA</h3>
                        <div class="order-infobox">
                            <div class="checkout-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">PRODUK</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-left">Sepatu Vans Murah <span>× 1</span></td>
                                            <td class="text-right">Rp30.000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Tas Ransel Biru <span>× 2</span></td>
                                            <td class="text-right">Rp20.000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="total-price">
                                            <th class="text-left">TOTAL BAYAR</th>
                                            <td class="text-right">Rp50.000</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="check-payment">
                                    <input type="radio" name="payment-method" id="checkout-payment-method-1" class="ho-radio" checked="checked">
                                    <label for="checkout-payment-method-1">Cash On Delivery</label>
                                </div>
                                <div class="paypal-payment">
                                    <input type="radio" name="payment-method" id="checkout-payment-method-2" class="ho-radio">
                                    <label for="checkout-payment-method-2">ATM Bank Transfer/Alfamart/Indomaret</label>
                                </div>
                            </div>
                            <button class="ho-button ho-button-fullwidth mt-30" type="submit">
                                <span>Pilih Pembayaran</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</main>