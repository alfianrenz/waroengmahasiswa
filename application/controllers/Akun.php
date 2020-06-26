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

    //lihat detail akun mahasiswa
    public function detail_akun_mahasiswa($id)
    {
        $data['title'] = 'Warma CIC | Detail Akun Mahasiswa';
        $data['mahasiswa'] = $this->user_model->getMahasiswa_id($id);
        $this->paggingAdmin('admin/akun_mahasiswa/detail_akun_mahasiswa', $data);
    }

    //nonaktifkan status akun mahasiswa
    public function nonaktifkan_statusakun_mahasiswa($id)
    {
        $this->user_model->nonaktifkan_statusAkun_Mahasiswa($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-nonaktif="Akun berhasil di nonaktifkan"></div>');
        redirect('akun/data_akun_mahasiswa');
    }

    //aktifkan status mahasiswa
    public function aktifkan_statusakun_mahasiswa($id)
    {
        $this->user_model->aktifkan_statusAkun_Mahasiswa($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-aktif="Akun berhasil di aktifkan"></div>');
        redirect('akun/data_akun_mahasiswa');
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

    //lihat detail akun umum
    public function detail_akun_umum($id)
    {
        $data['title'] = 'Warma CIC | Detail Akun Pengguna Umum';
        $data['umum'] = $this->user_model->getUmum_id($id);
        $this->paggingAdmin('admin/akun_umum/detail_akun_umum', $data);
    }

    //nonaktifkan status akun umum
    public function nonaktifkan_statusakun_umum($id)
    {
        $this->user_model->nonaktifkan_statusAkun_Umum($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-nonaktif="Akun berhasil di nonaktifkan"></div>');
        redirect('akun/data_akun_umum');
    }

    //aktifkan status akun umum
    public function aktifkan_statusakun_umum($id)
    {
        $this->user_model->aktifkan_statusAkun_Umum($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-aktif="Akun berhasil di aktifkan"></div>');
        redirect('akun/data_akun_umum');
    }
}
