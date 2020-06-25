<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    //TEMPLATE ADMIN
    public function paggingAdmin($content, $data = NULL)
    {
        //SESSION ADMIN
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();

        $data['header'] = $this->load->view('template/admin/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('template/admin/sidebar', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $this->load->view('template/admin/index', $data);
    }

    //TEMPLATE PENJUAL
    public function paggingPenjual($content, $data = NULL)
    {
        //Sesion mahasiswa join ke tabel master mahasiswa
        $data['s_mahasiswa'] =
            $this->db->select('*')
            ->from('akun_mahasiswa')
            ->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim')
            ->where('id_mahasiswa', $this->session->userdata('id'))
            ->get()->row_array();

        $data['header'] = $this->load->view('template/penjual/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('template/penjual/sidebar', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $this->load->view('template/penjual/index', $data);
    }

    //TEMPLATE PEMBELI
    public function paggingPembeli($content, $data = NULL)
    {
        //Sesion mahasiswa join ke tabel master mahasiswa
        $data['s_mahasiswa'] =
            $this->db->select('*')
            ->from('akun_mahasiswa')
            ->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim')
            ->where('id_mahasiswa', $this->session->userdata('id'))
            ->get()->row_array();

        //Session umum
        $data['s_umum'] = $this->db->get_where('akun_umum', ['id_umum' => $this->session->userdata('id')])->row_array();

        $data['header'] = $this->load->view('template/pembeli/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('template/pembeli/sidebar', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $this->load->view('template/pembeli/index', $data);
    }

    //TEMPLATE FRONTEND
    public function paggingFrontend($content, $data = NULL)
    {
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['header'] = $this->load->view('template/frontend/header', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/frontend/footer', $data, TRUE);
        $this->load->view('template/frontend/index', $data);
    }
}
