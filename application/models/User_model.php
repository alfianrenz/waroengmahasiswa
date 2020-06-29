<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // =========================================
    //                 ADMIN
    // =========================================

    //Get data admin by session id
    public function getAdmin_id($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(['id_admin' => $id]);
        return $this->db->get()->row_array();
    }

    //edit profile admin
    public function editProfile_admin()
    {
        $id_admin = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');

        //cek jika ada gambar
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['file_name']     = $this->input->post('nama');
            $config['upload_path']   = './upload/foto_user/';
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                // upload foto dan edit di database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_admin', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        //update nama, usernaeme dan email 
        $this->db->set('nama_admin', $nama);
        $this->db->set('username_admin', $username);
        $this->db->set('email_admin', $email);
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin');
    }


    //==========================================
    //                  MAHASISWA                   
    //==========================================

    //get data akun mahasiswa by id
    public function getMahasiswa_id($id)
    {
        $this->db->select('*');
        $this->db->from('akun_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
        $this->db->join('fakultas', 'mahasiswa.id_fakultas = fakultas.id_fakultas');
        $this->db->where(['id_mahasiswa' => $id]);
        return $this->db->get()->row_array();
    }

    //edit profile mahasiswa
    public function editProfile_mahasiswa()
    {
        $id_mahasiswa = $this->input->post('id');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');


        //cek jika ada gambar
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['file_name']     = $this->input->post('nama');
            $config['upload_path']   = './upload/foto_user/';
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                // upload foto dan edit di database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_mahasiswa', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        //update email, telepon dan alamat
        $this->db->set('email_mahasiswa', $email);
        $this->db->set('telepon_mahasiswa', $telepon);
        $this->db->set('alamat_mahasiswa', $alamat);
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->update('akun_mahasiswa');
    }

    //get seluruh data akun mahasiswa
    public function getAkun_Mahasiswa()
    {
        $this->db->select('*');
        $this->db->from('akun_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
        return $this->db->get()->result_array();
    }

    //nonaktifkan status akun mahasiswa
    public function nonaktifkan_statusAkun_Mahasiswa($id)
    {
        $data = [
            "status_aktif" => 0
        ];
        $this->db->where(['id_mahasiswa' => $id]);
        $this->db->update('akun_mahasiswa', $data);
    }

    //aktifkan status akun mahasiswa
    public function aktifkan_statusAkun_Mahasiswa($id)
    {
        $data = [
            "status_aktif" => 1
        ];
        $this->db->where(['id_mahasiswa' => $id]);
        $this->db->update('akun_mahasiswa', $data);
    }


    //==========================================
    //                  UMUM                   
    //==========================================

    //get data umum by id
    public function getUmum_id($id)
    {
        $this->db->select('*');
        $this->db->from('akun_umum');
        $this->db->where(['id_umum' => $id]);
        return $this->db->get()->row_array();
    }

    //edit profile umum
    public function editProfile_umum()
    {
        $id_umum = $this->input->post('id');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');


        //cek jika ada gambar
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['file_name']     = $this->input->post('username');
            $config['upload_path']   = './upload/foto_user/';
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                // upload foto dan edit di database
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        //update userneme, email dan telepon 
        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->set('telepon', $telepon);
        $this->db->where('id_umum', $id_umum);
        $this->db->update('akun_umum');
    }

    //get seluruh data akun umum
    public function getAkun_Umum()
    {
        $this->db->select('*');
        $this->db->from('akun_umum');
        return $this->db->get()->result_array();
    }

    //nonaktifkan status akun umum
    public function nonaktifkan_statusAkun_Umum($id)
    {
        $data = [
            "status_aktif" => 0
        ];
        $this->db->where(['id_umum' => $id]);
        $this->db->update('akun_umum', $data);
    }

    //aktifkan status akun umum
    public function aktifkan_statusAkun_Umum($id)
    {
        $data = [
            "status_aktif" => 1
        ];
        $this->db->where(['id_umum' => $id]);
        $this->db->update('akun_umum', $data);
    }


    //==========================================
    //                FRONTEND 
    //==========================================

    public function getdata_Penjual()
    {
        $this->db->select('*');
        $this->db->from('akun_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
        $this->db->where(['status_aktif' => 1]);
        return $this->db->get()->result_array();
    }

    //get detail akun mahasiswa(penjual) berdasarkan id
    public function getdetail_Penjual($id)
    {
        $this->db->select('*');
        $this->db->from('akun_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        $this->db->join('fakultas', 'mahasiswa.id_fakultas = fakultas.id_fakultas');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
        $this->db->where(['status_aktif' => 1])
            ->where(['id_mahasiswa' => $id]);
        return $this->db->get()->row_array();
    }
}
