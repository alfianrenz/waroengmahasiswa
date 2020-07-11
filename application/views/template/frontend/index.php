<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/frontend/images/logo/favicon-warma-blue.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/frontend/images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/plugins.css">
    <!-- Style Css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/style.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/custom.css">

</head>

<body>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?= $header; ?>

        <!-- Content -->
        <?= $content; ?>

        <!-- Footer -->
        <?= $footer; ?>

        <!-- Quickview Modal -->
        <div class="quickmodal" id="modal-produk">
            <div class="body-overlay"></div>
            <button class="quickmodal-close"><i class="ion ion-ios-close"></i></button>
            <div class="quickmodal-inside">
                <div class="container">
                    <div class="pdetails">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="pdetails-images">
                                    <!-- Foto -->
                                    <div class="pdetails-largeimages">
                                        <div class="pdetails-singleimage">
                                            <img id="modal-foto-produk" src="<?= base_url(); ?>assets/frontend/images/product/lg/product-image-1.jpg" alt="product image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="pdetails-content">
                                    <h2 id="modal-nama-produk">Nama Produk</h2>
                                    <div class="pdetails-pricebox">
                                        <span class="price" id="modal-harga-produk"></span>
                                    </div>
                                    <p id="modal-deskripsi-produk">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, eaque rerum! Dolore iste ipsa perspiciatis cumque velit, ut obcaecati sequi sunt, fugit est ullam doloremque minima eligendi cum soluta quos!
                                    </p>
                                    <div class="pdetails-quantity">
                                        <a href="#" class="ho-button">
                                            <i class="lnr lnr-cart"></i>
                                            <span>&nbsp;Tambahkan Ke Keranjang</span>
                                        </a>
                                    </div>
                                    <div class="pdetails-categories">
                                        <span>Kategori :</span>
                                        <ul>
                                            <li><a href="#" id="modal-kategori-produk">Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="pdetails-tags">
                                        <span>Stok :</span>
                                        <ul>
                                            <li><a href="shop-rightsidebar.html" id="modal-stok-produk">Electronic</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Js Files -->
    <script src="<?= base_url(); ?>assets/frontend/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/plugins.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/main.js"></script>

    <!-- Sweet Alert Js -->
    <script src="<?= base_url(); ?>assets/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/sweetalert/script_sweetalert.js"></script>

    <!-- Snap Midtrans -->
    <!-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-r3Il2sHQSHWzr--h"></script> -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-iomHsitSHcf_BPl5"></script>

    <!-- Snap Token -->
    <script type="text/javascript">
        // var payButton = document.getElementById('pembayaran');
        // payButton.addEventListener('click', function() {
        // });

        // console.log('asdsad');

        $('#checkout').submit(function(e) {

            e.preventDefault();
            var form = $(this);
            var formData = false;
            if (window.FormData) {
                formdata = new FormData(form[0]);
            }

            $.ajax({
                url: "<?= site_url('checkout/getToken'); ?>",
                data: formdata ? formdata : form.serialize(),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data, status, jqXHR) {
                    console.log(data);
                    if (data.error) {
                        if (data.validasi_kota != '') {
                            $('#validasi_kota').html(data.validasi_kota);
                        } else {
                            $('#validasi_kota').html('');
                        }
                        if (data.validasi_kode_pos != '') {
                            $('#validasi_kode_pos').html(data.validasi_kode_pos);
                        } else {
                            $('#validasi_kode_pos').html('');
                        }
                        if (data.validasi_alamat != '') {
                            $('#validasi_alamat').html(data.validasi_alamat);
                        } else {
                            $('#validasi_alamat').html('');
                        }
                    } else {
                        snap.pay(data.token);
                    }
                }
            });
        });
    </script>

    <!-- Untuk Detail Produk di Modal -->
    <script type="text/javascript">
        const showDetailProduk = (id_produk) => {
            //Ambil nilai dari attribute produk
            const namaProduk = $("#nama-produk-" + id_produk).text();
            const fotoProduk = $("#foto-produk-" + id_produk).attr('src');
            const hargaProduk = $("#price-produk-" + id_produk).text();
            const kategoriProduk = $("#nama-kategori-produk-" + id_produk).text();
            const deskripsiProduk = $("#deskripsi-produk-" + id_produk).val();
            const stokProduk = $("#stok_produk-" + id_produk).text();
            //console.log(deskripsiProduk);

            //Masukkan nilai ke modal
            $("#modal-nama-produk").text(namaProduk);
            $("#modal-foto-produk").attr('src', fotoProduk);
            $("#modal-harga-produk").text(hargaProduk);
            $("#modal-kategori-produk").text(kategoriProduk);
            $("#modal-deskripsi-produk").html(deskripsiProduk);
            $("#modal-stok-produk").text(stokProduk);
            $('.quickmodal').toggleClass('is-visible');
        }
    </script>

    <!-- Update Kuantitas -->
    <script type="text/javascript">
        function updateKuantitas(id_detail) {
            $("#detail-keranjang-" + id_detail).submit();
        }
    </script>


</body>

</html>