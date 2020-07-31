<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    //==========================================
    //              PENJUAL
    //==========================================

    public function get_penjualan()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where(['id_mahasiswa' => $this->session->userdata('id')]);
        return $this->db->get()->result_array();
    }
}
