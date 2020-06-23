<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    //=========================================
    //                 ADMIN
    //=========================================

    public function index()
    {
        //jika session tidak ada
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $data['title'] = 'Warma CIC | Profile';
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getAdmin_id($id);
        $this->paggingAdmin('admin/profile/profile_admin', $data);
    }

    //edit profile admin
    public function edit_profile_admin()
    {
        //jika session tidak ada
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $data['title'] = 'Warma CIC | Edit Profile';
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getAdmin_id($id);

        //form validasi set rules
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
            'required' => 'Form ini tidak boleh kosong',
            'valid_email' => 'Penulisan email tidak valid'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->paggingAdmin('admin/profile/edit_profile', $data);
        } else {
            $this->user_model->editProfile_admin();
            $this->session->set_flashdata('message', '<div class="flash-data" data-flashdata="Data Berhasil di Ubah"></div>');
            redirect('profile/index');
        }
    }

    //ubah password admin
    public function ubah_password_admin()
    {
        //jika session tidak ada
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $data['title'] = 'Warma CIC | Ubah Password';
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getAdmin_id($id);

        //form validasi set rules
        $this->form_validation->set_rules('pw_lama', 'pw_lama', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pw_baru', 'pw_baru', 'required|min_length[3]', [
            'required' => 'Form ini tidak boleh kosong',
            'min_length' => 'Minimal di isi dengan 3 Karakter',
        ]);
        $this->form_validation->set_rules('pw_baru2', 'pw_baru2', 'required|min_length[3]|matches[pw_baru]', [
            'required' => 'Form ini tidak boleh kosong',
            'min_length' => 'Minimal di isi dengan 3 Karakter',
            'matches' => 'Password tidak sama'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->paggingAdmin('admin/profile/ubah_password', $data);
        } else {
            $password_lama = $this->input->post('pw_lama');
            $password_baru = $this->input->post('pw_baru');
            if (!password_verify($password_lama, $data['admin']['password_admin'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah</div>');
                redirect('profile/ubah_password_admin');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                    redirect('profile/ubah_password_admin');
                } else {
                    //password OK
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password_admin', $password_hash);
                    $this->db->where('id_admin', $this->session->userdata('id'));
                    $this->db->update('admin');
                    $this->session->set_flashdata('message', '<div class="flash-data" data-ubahpassword="Password Berhasil Diubah"></div>');
                    redirect('profile');
                }
            }
        }
    }
}
