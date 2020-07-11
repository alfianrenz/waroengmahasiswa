<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    //buat akun Mahasiswa
    public function buatAkun_mahasiswa()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            "nim" => $this->input->post('nim'),
            "email_mahasiswa" => $this->input->post('email'),
            "password_mahasiswa" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            "alamat_mahasiswa" => $this->input->post('alamat'),
            "telepon_mahasiswa" => $this->input->post('telepon'),
            "tanggal_daftar" =>  date('Y-m-d H:i:s'),
            "foto_mahasiswa" => 'default.png',
            "status_aktif" => 1,
            "tipe" => 1,
        ];
        $this->db->insert('akun_mahasiswa', $data);
    }

    //buat akun Umum
    public function buatAkun_umum()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "username" => $this->input->post('username'),
            "telepon" => $this->input->post('telepon'),
            "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            "tanggal_daftar" =>  date('Y-m-d H:i:s'),
            "foto" => 'default.png',
            "status_aktif" => 1,
            "tipe" => 2,
        ];
        $this->db->insert('akun_umum', $data);
    }
}
