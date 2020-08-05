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
        $data['penghasilan'] = $this->laporan_model->penghasilan_penjual();
        for ($i = 0; $i < count($data['penghasilan']); $i++) {
            $id = $data['penghasilan'][$i]['id_mahasiswa'];
            $data['penghasilan'][$i]['total_penghasilan'] = $this->laporan_model->hitung_penghasilan($id);
        }
        $this->paggingAdmin('admin/penghasilan/penghasilan_penjual', $data);
    }

    public function detail_penghasilan()
    {
        $data['title'] = 'Warma CIC | Penghasilan Penjual';
        $this->paggingAdmin('admin/penghasilan/detail_penghasilan');
    }


    //=======================================
    //               PENJUAL
    //=======================================
    public function info_penjualan()
    {
        $data['title'] = 'Warma CIC | Penjualan';
        $penjualan = $this->laporan_model->get_penjualan();
        $produk_terjual = 0;
        for ($i = 0; $i < count($penjualan); $i++) {
            $id_produk = $penjualan[$i]['id_produk'];
            $penjualan[$i]['terjual'] = $this->db->query("SELECT SUM(kuantitas) AS terjual FROM detail_keranjang JOIN keranjang USING (id_keranjang) JOIN transaksi USING (id_keranjang) WHERE id_produk = '$id_produk' AND status_pesanan = 'Selesai'")->row()->terjual;
            $produk_terjual += $penjualan[$i]['terjual'];
        }

        $data['penjualan'] = $penjualan;
        $data['produk_terjual'] = $produk_terjual;

        $id = $this->session->userdata('id');
        $data['penghasilan'] = $this->laporan_model->hitung_penghasilan($id);

        $this->paggingPenjual('penjual/penjualan/info_penjualan', $data);
    }

    public function detail_penjualan($id)
    {
        $data['title'] = 'Warma CIC | Penjualan';
        $data['penjualan'] = $this->laporan_model->get_detailPenjualan($id);
        $this->paggingPenjual('penjual/penjualan/detail_penjualan', $data);
    }
}
