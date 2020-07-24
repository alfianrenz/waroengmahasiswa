<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkout_model');
        $this->load->model('user_model');
    }

    //DASHBOARD ADMIN
    public function index()
    {
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $data['title'] = 'Warma CIC | Dashboard';
        $data['jumlahakunmahasiswa'] = $this->db->get('akun_mahasiswa')->num_rows();
        $data['jumlahakunumum'] = $this->db->get('akun_umum')->num_rows();
        $data['jumlahtransaksi'] = $this->db->get('transaksi')->num_rows();
        $data['jumlahkategori'] = $this->db->get('kategori')->num_rows();
        $data['mahasiswa'] = $this->user_model->getAkun_Mahasiswa();
        $data['transaksi'] = $this->checkout_model->getAll_transaksi();
        $this->paggingAdmin('admin/dashboard/dashboard', $data);
    }

    //DASHBOARD PENJUAL
    public function penjual()
    {
        $data['title'] = 'Warma CIC | Dashboard Penjual';
        $data['jumlahproduk'] = $this->db->get_where('produk', ['id_mahasiswa' => $this->session->userdata('id')])->num_rows();
        $this->paggingPenjual('penjual/dashboard/dashboard', $data);
    }

    //DASHBOARD PEMBELI
    public function pembeli()
    {
        $data['title'] = 'Warma CIC | Dashboard Pembeli';
        $data['transaksi'] = $this->checkout_model->getTransaksi_pembeli();
        $this->paggingPembeli('pembeli/dashboard/dashboard', $data);
    }
}
