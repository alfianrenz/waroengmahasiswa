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

    public function laporan_transaksi($filter = NULL)
    {
        $filter = $this->input->post('status');
        if (isset($filter)) {
            $data['title'] = 'Warma CIC | Laporan Transaksi';
            $data['transaksi'] = $this->laporan_model->getLaporan_transaksi($filter);
            $data['filter'] = $filter;
            $this->paggingAdmin('admin/laporan/laporan_transaksi', $data);
        } else {
            $data['title'] = 'Warma CIC | Laporan Transaksi';
            $data['transaksi'] = $this->laporan_model->getLaporan_transaksi($filter = 9999);
            $data['filter'] = $filter;
            $this->paggingAdmin('admin/laporan/laporan_transaksi', $data);
        }
    }

    //print laporan transaksi
    public function print_laporan_transaksi()
    {
        $filter = $this->input->post('filter');
        $data['title'] = 'Warma CIC | Print';
        $data['transaksi'] = $this->laporan_model->getLaporan_transaksi($filter);
        $this->load->view('admin/laporan/print_laporan', $data);
    }

    //saldo penjual
    public function saldo_penjual()
    {
        $data['title'] = 'Warma CIC | Saldo Penjual';
        $this->paggingAdmin('admin/laporan/saldo_penjual', $data);
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
