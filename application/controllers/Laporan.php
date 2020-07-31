<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
        $this->load->model('checkout_model');
    }

    //===========================================
    //                  ADMIN
    //===========================================

    public function laporan_transaksi()
    {
        $data = [
            'transaksi' => [],
            'tgl_awal' => "",
            'tgl_akhir' => "",
        ];
        if (isset($_GET['tgl_awal'], $_GET['tgl_akhir'])) {
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');

            $query = $this->db->select('*')
                ->from('transaksi')
                ->where('DATE(waktu_transaksi) >=', $tgl_awal)
                ->where('DATE(waktu_transaksi) <=', $tgl_akhir)
                ->order_by('waktu_transaksi', 'DESC')
                ->get()->result_array();
            //print_r($query);
            $data['transaksi'] = $query;
            $data['tgl_awal'] = $tgl_awal;
            $data['tgl_akhir'] = $tgl_akhir;
        }

        $data['title'] = 'Warma CIC | Laporan Transaksi';
        //$data['filter'] = $filter;
        $this->paggingAdmin('admin/laporan/laporan_transaksi', $data);
    }

    //print laporan transaksi
    public function print_laporan_transaksi()
    {
        $data['transaksi'] = [];
        if (isset($_GET['tgl_awal'], $_GET['tgl_akhir'])) {
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');

            $query = $this->db->select('*')
                ->from('transaksi')
                ->where('DATE(waktu_transaksi) >=', $tgl_awal)
                ->where('DATE(waktu_transaksi) <=', $tgl_akhir)
                ->order_by('waktu_transaksi', 'DESC')
                ->get()->result_array();
            //print_r($query);
            $data['transaksi'] = $query;
        }

        $this->load->view('admin/laporan/print_laporan', $data);
    }

    //===========================================
    //                  PENJUAL
    //===========================================

    public function laporan_penjualan()
    {
        $data = [
            'transaksi' => [],
            'tgl_awal' => "",
            'tgl_akhir' => "",
        ];
        if (isset($_GET['tgl_awal'], $_GET['tgl_akhir'])) {
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');

            $query = $this->db->select('*')
                ->from('transaksi')
                ->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang')
                ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
                ->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa')
                ->where('DATE(waktu_transaksi) >=', $tgl_awal)
                ->where('DATE(waktu_transaksi) <=', $tgl_akhir)
                ->where('produk.id_mahasiswa', $this->session->userdata('id'))
                ->where('transaksi.status_pesanan', 'Selesai')
                ->order_by('waktu_transaksi', 'DESC')
                ->group_by('transaksi.order_id')
                ->get()->result_array();
            //print_r($query);
            $data['transaksi'] = $query;
            $data['tgl_awal'] = $tgl_awal;
            $data['tgl_akhir'] = $tgl_akhir;
        }

        $data['title'] = 'Warma CIC | Laporan Penjualan';
        $this->paggingPenjual('penjual/laporan/laporan_penjualan', $data);
    }

    public function detail_laporan_penjualan($id)
    {
        $data['title'] = 'Warma CIC | Detail Laporan';
        $data['transaksi'] = $this->checkout_model->getDetail_transaksiPenjual($id);
        $data['item'] = $this->checkout_model->detailitem_Penjual($id);
        $this->paggingPenjual('penjual/laporan/detail_laporan', $data);
    }
}
