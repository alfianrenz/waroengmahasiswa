<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    //==========================================
    //                 ADMIN
    //==========================================

    public function penghasilan_penjual()
    {
        $this->db->select('*');
        $this->db->from('akun_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
        return $this->db->get()->result_array();
    }

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
