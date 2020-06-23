<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // =========================================
    //                  ADMIN
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
}
