<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
    //get data keranjang
    public function data_keranjang()
    {
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->join('produk', 'keranjang.id_produk = produk.id_produk');
        $this->db->where('id_pembeli', $this->session->userdata('id'));
        $this->db->where('tipe_pembeli', $this->session->userdata('tipe'));
        return $this->db->get()->result_array();
    }

    //tambahkan ke keranjang
    public function tambah_keranjang($id_produk)
    {
        $id_pembeli = $this->session->userdata('id');
        $tipe_pembeli = $this->session->userdata('tipe');

        //Insert ke tabel keranjang
        $data_keranjang = [
            'id_pembeli'    => $id_pembeli,
            'tipe_pembeli'  => $tipe_pembeli,
            'id_produk'     => $id_produk,
            'kuantitas'     => 1,
            'subtotal'      => 0,
            'total_belanja' => 0
        ];
        $this->db->insert("keranjang", $data_keranjang);
    }

    public function hapus_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->where('id_pembeli', $this->session->userdata('id'));
        $this->db->where('tipe_pembeli', $this->session->userdata('tipe'));
        $this->db->delete('keranjang');
    }
}
