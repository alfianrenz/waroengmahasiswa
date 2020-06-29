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
    public function data_penjual()
    {
        $data['title'] = 'Warma CIC | Data Penjual';
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $data['penjual'] = $this->user_model->getdata_Penjual();
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
