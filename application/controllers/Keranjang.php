<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('keranjang_model');
    }

    //Halaman Keranjang Belanja
    public function halaman_keranjang()
    {
        if (!$this->session->userdata('id')) {
            redirect('auth/login_mahasiswa');
        }

        $data['title'] = 'Warma CIC | Keranjang';
        $this->paggingFrontend('frontend/keranjang', $data);
    }

    //Tambahkan ke keranjang
    public function tambah_keranjang($id)
    {
        if (!$this->session->userdata('id')) {
            redirect('auth/login_mahasiswa');
        }

        $this->keranjang_model->tambahKeranjang($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-tambahkeranjang="Produk berhasil ditambahkan ke keranjang"></div>');
        echo '<script>window.history.back();</script>';
    }
}
