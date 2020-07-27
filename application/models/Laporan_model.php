<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    //get data laporan transaksi
    public function getLaporan_transaksi($filter)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where(['status_bayar' => $filter]);
        return $this->db->get()->result_array();
    }
}
