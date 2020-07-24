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
        $data['transaksi'] = $this->checkout_model->getTransaksi_byID();
        $this->paggingPembeli('pembeli/pesanan/daftar_pesanan', $data);
    }

    //get detail pesanan
    public function detail_pesanan_pembeli($id)
    {
        $data['title'] = 'Warma CIC | Detail Pesanan';
        $data['transaksi'] = $this->checkout_model->getDetail_transaksi($id);
        $this->paggingPembeli('pembeli/pesanan/detail_pesanan', $data);
    }
}
