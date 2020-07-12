<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkout_model');
    }

    //========================================
    //                PENJUAL
    //========================================

    public function daftar_pesanan_penjual()
    {
        $data['title'] = 'Warma CIC | Pesanan';
        $this->paggingPenjual('penjual/pesanan/daftar_pesanan', $data);
    }

    //========================================
    //                PEMBELI
    //========================================

    public function daftar_pesanan_pembeli()
    {
        $data['title'] = 'Warma CIC | Pesanan';
        $data['transaksi'] = $this->checkout_model->get_transaksi();
        $this->paggingPembeli('pembeli/pesanan/daftar_pesanan', $data);
    }
}
