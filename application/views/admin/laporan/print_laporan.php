<html>

<head>
    <title>Laporan Transaksi</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/dist/img/logo/cic_putih.png">
</head>

<body>

    <div align='center' width='750px' style="float:center">
        <div style="float:left">
            <img src="<?php echo base_url(); ?>assets/backend/images/logo/logo_bkm.png" width='120px' height='70px'>
        </div>
        <div style="float:center; line-height:8pt">
            <h3> BADAN KOORDINASI MAHASISWA CIC </h3>
            <p> Jl. Kesambi No. 202 Cirebon - 45134</p>
            <p> Website : http://www.bkmcic.com Email : bkmcic.official@gmail.com</p>
        </div>
    </div>
    <hr size="2" style="background-color:black">
    <br>
    <h3>Laporan Transaksi</h3>
    <table border=1 cellspadding=0 cellspacing=0 style="width: 100%">
        <tr>
            <th>Order ID</th>
            <th>Metode Pembayaran</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal dan Waktu</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
        <?php
        $no = 1;
        foreach ($transaksi as $t) : ?>
            <tr align="center">
                <td><?= $no++; ?></td>
                <td><?= $t['order_id'] ?></td>
                <td><?= $t['nama_pelanggan'] ?></td>
                <td><?= $t['waktu_transaksi'] ?></td>
                <td>Rp<?= number_format($t['total_bayar'], 0, ',', '.'); ?></td>
                <td>
                    <?php if ($t['status_bayar'] == 'pending') { ?>
                        <span class="badge badge-warning">Pending</span>
                    <?php } else if ($t['status_bayar'] == 'expire') { ?>
                        <span class="badge badge-danger">Failure</span>
                    <?php } else if ($t['status_bayar'] == 'settlement') { ?>
                        <span class="badge badge-success">Settlement</span>
                    <?php } else { ?>
                        <span class="badge badge-danger">Cancel</span>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <br>
    <br>
    <div align='right' style='padding-right: 74px;'>Cirebon, <?php echo date("d F Y") ?></div>
    <br>
    <br>
    <br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;
    <div align='right' style='padding-right: 100px;'>R&D BKM CIC</div>
    <script>
        window.print();
    </script>

</body>

</html>