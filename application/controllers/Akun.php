<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    //===========================================
    //               AKUN MAHASISWA
    //===========================================
    public function data_akun_mahasiswa()
    {
        $data['title'] = 'Warma CIC | Akun Mahasiswa';
        $data['mahasiswa'] = $this->user_model->getAkun_Mahasiswa();
        $this->paggingAdmin('admin/akun_mahasiswa/data_akun_mahasiswa', $data);
    }

    //===========================================
    //               AKUN UMUM
    //===========================================
    public function data_akun_umum()
    {
        $data['title'] = 'Warma CIC | Akun Umum';
        $data['umum'] = $this->user_model->getAkun_Umum();
        $this->paggingAdmin('admin/akun_umum/data_akun_umum', $data);
    }
}
