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

    public function daftar_pesanan_penjual($sortby = '')
    {
        $data['title'] = 'Warma CIC | Pesanan';
        $data['transaksi'] = $this->checkout_model->getTransaksi_penjual($sortby);
        $this->paggingPenjual('penjual/pesanan/daftar_pesanan', $data);
    }

    public function detail_pesanan_penjual($id)
    {
        $data['title'] = 'Warma CIC | Detail Pesanan';
        $data['transaksi'] = $this->checkout_model->getDetail_transaksiPenjual($id);
        $data['item'] = $this->checkout_model->detailitem_Penjual($id);
        $this->paggingPenjual('penjual/pesanan/detail_pesanan', $data);
    }

    public function input_pengiriman($id)
    {
        $this->checkout_model->input_pengiriman($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-inputpengiriman="Produk sedang dikirim"></div>');
        echo '<script>window.history.back();</script>';
    }

    //========================================
    //                PEMBELI
    //========================================

    public function daftar_pesanan_pembeli($sortby = '')
    {
        $data['title'] = 'Warma CIC | Pesanan';
        $data['transaksi'] = $this->checkout_model->getTransaksi_pembeli($sortby);
        $this->paggingPembeli('pembeli/pesanan/daftar_pesanan', $data);
    }

    //get detail pesanan
    public function detail_pesanan_pembeli($id)
    {
        $data['title'] = 'Warma CIC | Detail Pesanan';
        $data['transaksi'] = $this->checkout_model->getDetail_transaksi($id);
        $data['item'] = $this->checkout_model->detailitem_Pembeli($id);
        $this->paggingPembeli('pembeli/pesanan/detail_pesanan', $data);
    }

    public function konfirmasi_barang($id)
    {
        $this->checkout_model->konfirmasi_barang($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-konfirmasibarang="Barang telah diterima"></div>');
        echo '<script>window.history.back();</script>';
    }

    public function cancel_pesanan($id)
    {
        $this->checkout_model->cancel_pesanan($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-cancelpesanan="Pesanan Berhasil Dibatalkan"></div>');
        echo '<script>window.history.back();</script>';
    }
}
