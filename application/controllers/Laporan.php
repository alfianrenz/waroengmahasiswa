<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends My_Controller
{
    //Laporan transaksi pada halaman admin
    public function laporan_transaksi()
    {
        $data['title'] = 'Warma CIC | Laporan Transaksi';
        $this->paggingAdmin('admin/laporan/laporan_transaksi', $data);
    }
}
