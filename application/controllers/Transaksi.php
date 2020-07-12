<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkout_model');
    }

    //Data transaksi pada halaman admin
    public function data_transaksi()
    {
        $data['title'] = 'Warma CIC | Data Transaksi';
        $data['transaksi'] = $this->checkout_model->getAll_transaksi();
        $this->paggingAdmin('admin/transaksi/data_transaksi', $data);
    }
}
