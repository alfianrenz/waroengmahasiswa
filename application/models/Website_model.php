<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website_model extends CI_Model
{

    //===================================
    //        PROFILE WEBSITE
    //===================================

    //get data profile website
    public function getProfile_website()
    {
        $this->db->select('*');
        $this->db->from('profile_website');
        return $this->db->get()->row_array();
    }

    //edit profile website
    public function editProfile_website()
    {
        $data = [
            'nama_website' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon'),
            'instagram' => $this->input->post('instagram'),
        ];
        $this->db->update('profile_website', $data);
    }


    //===================================
    //             SLIDER
    //===================================

    public function getData_slider()
    {
        $this->db->select('*');
        $this->db->from('slider');
        return $this->db->get()->result_array();
    }

    //tambah slider
    public function tambah_slider()
    {
        //upload gambar
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '6144';
            $config['file_name']     = $this->input->post('keterangan');
            $config['upload_path']   = './upload/foto_slider/';
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');

                $data = [
                    "foto_slider" => $foto,
                    "keterangan" => $this->input->post('keterangan', true),
                    "status" => $this->input->post('status', true)
                ];
                $this->db->insert('slider', $data);
            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors());
                redirect('website/data_slider');
            }
        }
    }

    //hapus slider
    public function hapus_slider($id)
    {
        $slider = $this->db->get_where('slider', ['id_slider' => $id])->row();
        $query = $this->db->delete('slider', ['id_slider' => $id]);
        if ($query) {
            unlink('./upload/foto_slider/' . $slider->foto_slider);
        }
    }


    //===================================
    //             TENTANG WARMA
    //===================================

    //get data tentang warma
    public function tentang_warma()
    {
        $this->db->select('*');
        $this->db->from('tentang_warma');
        return $this->db->get()->row_array();
    }

    //edit tentang warma
    public function edit_tentang_warma()
    {
        $data = [
            'tentang' => $this->input->post('tentang'),
            'tujuan' => $this->input->post('tujuan'),
        ];
        $this->db->update('tentang_warma', $data);
    }
}
