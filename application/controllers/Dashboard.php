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
    public function index($sortby = '')
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
        $data['transaksi'] = $this->checkout_model->getAll_transaksi($sortby);
        $this->paggingAdmin('admin/dashboard/dashboard', $data);
    }

    //DASHBOARD PENJUAL
    public function penjual($sortby = '')
    {
        $data['title'] = 'Warma CIC | Dashboard Penjual';
        $data['transaksi'] = $this->checkout_model->getTransaksi_penjual($sortby);
        $data['jml_pesanan'] = $this->checkout_model->jumlah_pesanan();
        $data['belum_bayar'] = $this->checkout_model->belum_bayar();
        $data['diproses'] = $this->checkout_model->diproses();
        $this->paggingPenjual('penjual/dashboard/dashboard', $data);
    }

    //DASHBOARD PEMBELI
    public function pembeli($sortby = '')
    {
        $data['title'] = 'Warma CIC | Dashboard Pembeli';
        $data['transaksi'] = $this->checkout_model->getTransaksi_pembeli($sortby);

        $data['jumlahpesanan'] = $this->db->get_where('transaksi', ['id_pembeli' => $this->session->userdata('id')])->num_rows();

        $data['belumbayar'] = $this->db->get_where('transaksi', ['id_pembeli' => $this->session->userdata('id'), 'status_pesanan' => 'Belum Bayar'])->num_rows();

        $data['dikirim'] = $this->db->get_where('transaksi', ['id_pembeli' => $this->session->userdata('id'), 'status_pesanan' => 'Dikirim'])->num_rows();

        $data['selesai'] = $this->db->get_where('transaksi', [
            'id_pembeli' => $this->session->userdata('id'),
            'status_pesanan' => 'Selesai'
        ])->num_rows();

        $this->paggingPembeli('pembeli/dashboard/dashboard', $data);
    }
}
