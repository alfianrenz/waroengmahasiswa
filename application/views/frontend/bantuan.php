<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                <li>Bantuan</li>
            </ul>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="page-content">

    <!-- Content Bantuan -->
    <div class="checkout-area bg-white ptb-30">
        <div class="container">

            <div class="row mb-30">
                <div class="col-sm-8">
                    <div class="accordion" id="accordionExample">
                        <div class="card mb-0">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="text-primary">+ Bagaimana cara berbelanja?</a></h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?= $bantuan['bantuan1']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0"><a href="#!" class="collapsed text-primary" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">+ Bagaimana caranya menjadi penjual?</a></h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?= $bantuan['bantuan3']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0"><a href="#!" class="collapsed text-primary" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">+ Bagaimana dengan pembayaran?</a></h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?= $bantuan['bantuan2']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <img src="<?= base_url(); ?>assets/frontend/images/others/contact.png" alt="beautiful girl" class="mt-3">
                    <h3 class="mt-4 ml-5">MASIH BINGUNG?</h3>
                    <a href="https://api.whatsapp.com/send?phone=<?= $website['telepon']; ?>" target="_blank">
                        <button class="ho-button ml-5"><i class="ion ion-logo-whatsapp"></i>&nbsp;&nbsp;Hubungi Kami</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>