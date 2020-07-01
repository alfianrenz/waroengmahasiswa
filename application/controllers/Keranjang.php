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

        // if (!$this->session->userdata('id')) {
        //     redirect('auth/login_mahasiswa');
        // }

        // $data['title'] = 'Warma CIC | Keranjang';

        // $status_pembeli = $this->session->userdata('tipe');
        // $id_pembeli = $this->session->userdata('id');

        // $keranjang = $this->db->where('status_pembeli', $status_pembeli)
        //     ->where('id_pembeli', $id_pembeli)
        //     ->where('status_bayar', 0)
        //     ->get('keranjang')->row_array();
        // $detail_keranjang = $this->db->query("
        //     SELECT * FROM detail_keranjang
        //     JOIN produk USING (id_produk)
        //      WHERE id_keranjang = '$keranjang[id_keranjang]'
        // ")->result_array();
        // $data['keranjang'] = $keranjang;
        // $data['detail_keranjang'] = $detail_keranjang;
        // $this->paggingFrontend('frontend/keranjang', $data);
    }

    //Tambahkan ke keranjang
    public function tambah_keranjang($id_produk)
    {
        if (!$this->session->userdata('id')) {
            redirect('auth/login_mahasiswa');
        }

        $this->keranjang_model->tambahKeranjang($id_produk);
        $this->session->set_flashdata('message', '<div class="flash-data" data-tambahkeranjang="Produk berhasil ditambahkan ke keranjang"></div>');
        echo '<script>window.history.back();</script>';
    }

    public function update_kuantitas($id_detail)
    {
        $kuantitas = $this->input->post('kuantitas');
        $id_produk = $this->input->post('id_produk');
        $produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();

        if ($kuantitas > $produk['stok_produk']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Tidak boleh lebih dari stok produk</div>');
        } else if ($kuantitas <= 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Kuantitas tidak boleh kurang dari nol</div>');
        } else {
            $this->keranjang_model->update_kuantitas($id_detail, $kuantitas);
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Berhasil mengupdate kuantitas</div>');
        }
        redirect('keranjang/halaman_keranjang');
    }
}
