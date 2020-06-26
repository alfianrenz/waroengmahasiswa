<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends My_Controller
{
    //View data produk
    public function data_produk()
    {
        $data['title'] = 'Warma CIC | Produk';
        $this->paggingPenjual('penjual/produk/data_produk', $data);
    }

    //Tambah Produk
    public function tambah_produk()
    {
        $data['title'] = 'Warma CIC | Tambah Produk';
        $data['kategori'] = $this->db->get('kategori')->result_array();

        //set rules form validation
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim', [
            'required' => 'Harap pilih kategori'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'required|trim|numeric', [
            'required' => 'Form ini tidak boleh kosong',
            'numeric'  => 'Harus di isi dengan angka'
        ]);
        $this->form_validation->set_rules('stok', 'stok', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong',
            'numeric'  => 'Harus di isi dengan angka'
        ]);
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim', [
            'required' => 'Form ini tidak oleh kosong'
        ]);

        //jika validasi salah 
        if ($this->form_validation->run() == FALSE) {
            $this->paggingPenjual('penjual/produk/tambah_produk', $data);
        } else {
        }
    }
}
