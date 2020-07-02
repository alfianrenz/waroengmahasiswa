<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends My_Controller
{
    //Data transaksi pada halaman admin
    public function data_transaksi()
    {
        $data['title'] = 'Warma CIC | Data Transaksi';
        $this->paggingAdmin('admin/transaksi/data_transaksi', $data);
    }
}
