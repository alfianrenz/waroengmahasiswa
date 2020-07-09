<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_model extends CI_Model
{
    //get data detail keranjang
    public function getdetail_keranjang()
    {
        $this->db->select('*');
        $this->db->from('detail_keranjang');
        $this->db->join('keranjang', 'detail_keranjang.id_keranjang = keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->where('id_pembeli', $this->session->userdata('id'));
        return $this->db->get()->result_array();
    }
}
