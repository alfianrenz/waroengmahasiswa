<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjual extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('produk_model');
    }

    //view data penjual
    public function data_penjual($sortby = '', $id_mahasiswa = '')
    {
        $data['title'] = 'Warma CIC | Data Penjual';

        //Query menjumlahkan mahasiswa berdasarkan id_prodi
        $prodi = $this->db->get('prodi')->result_array();
        for ($i = 0; $i < count($prodi); $i++) {
            $id_prodi = $prodi[$i]['id_prodi'];
            $jumlah_mahasiswa = $this->db->query("
                SELECT COUNT(*) AS jumlah FROM `mahasiswa` WHERE nim IN (
                    SELECT nim FROM akun_mahasiswa
                ) AND id_prodi = '$id_prodi'
            ")->row_array();
            $prodi[$i]['jumlah_mahasiswa'] = $jumlah_mahasiswa['jumlah'];
        }

        $data['prodi'] = $prodi;
        $penjual = $this->user_model->getdata_Penjual($sortby);
        if (!empty(trim($sortby)) && !empty(trim($id_mahasiswa))) {
            $penjual = $this->user_model->getdata_penjualByprodi($id_mahasiswa);
        }
        $data['penjual'] = $penjual;
        $this->paggingFrontend('frontend/data_penjual', $data);
    }

    //detail penjual 
    public function detail_penjual($id)
    {
        $data['title'] = 'Warma CIC | Detail Penjual';
        $data['penjual'] = $this->user_model->getdetail_Penjual($id);
        $data['produk'] = $this->produk_model->getProduk_idMahasiswa($id);
        $this->paggingFrontend('frontend/detail_penjual', $data);
    }
}
