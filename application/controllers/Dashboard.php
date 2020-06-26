<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{
    //DASHBOARD ADMIN
    public function index()
    {
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $data['title'] = 'Warma CIC | Dashboard';
        $data['jumlahakunmahasiswa'] = $this->db->get('akun_mahasiswa')->num_rows();
        $data['jumlahakunumum'] = $this->db->get('akun_umum')->num_rows();
        $this->paggingAdmin('admin/dashboard/dashboard', $data);
    }

    //DASHBOARD PENJUAL
    public function penjual()
    {
        $data['title'] = 'Warma CIC | Dashboard Penjual';
        $this->paggingPenjual('penjual/dashboard/dashboard', $data);
    }

    //DASHBOARD PEMBELI
    public function pembeli()
    {
        $data['title'] = 'Warma CIC | Dashboard Pembeli';
        $this->paggingPembeli('pembeli/dashboard/dashboard', $data);
    }
}
