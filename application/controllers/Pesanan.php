<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends My_Controller
{
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
        $this->paggingPembeli('pembeli/pesanan/daftar_pesanan', $data);
    }
}
