<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
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

    //saldo penjual
    public function penghasilan_penjual()
    {
        $data['title'] = 'Warma CIC | Penghasilan Penjual';
        $this->paggingAdmin('admin/laporan/penghasilan_penjual', $data);
    }


    //===========================================
    //                  PENJUAL
    //===========================================

    public function laporan_penjualan()
    {
        $data['title'] = 'Warma CIC | Laporan Penjualan';
        $this->paggingPenjual('penjual/laporan/laporan_penjualan', $data);
    }
}
