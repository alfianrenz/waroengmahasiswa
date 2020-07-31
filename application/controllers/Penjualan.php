<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
    }

    //=======================================
    //                ADMIN
    //=======================================
    public function penghasilan_penjual()
    {
        $data['title'] = 'Warma CIC | Penghasilan Penjual';
        $this->paggingAdmin('admin/penghasilan/penghasilan_penjual', $data);
    }


    //=======================================
    //               PENJUAL
    //=======================================
    public function info_penjualan()
    {
        $data['title'] = 'Warma CIC | Penjualan';
        $data['produk'] = $this->laporan_model->get_penjualan();
        $data['website'] = $this->db->get('profile_website')->row_array();

        //Penghasilan
        $penghasilan = 0;
        $transaksi = $this->db->get_where('transaksi', ['status_pesanan' => 'Selesai'])->result_array();
        foreach ($transaksi as $t) {
            $penghasilan = $penghasilan + $t['total_bayar'];
        }
        $data['penghasilan'] = $penghasilan;

        $this->paggingPenjual('penjual/penjualan/info_penjualan', $data);
    }
}