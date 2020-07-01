<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends My_Controller
{
    public function halaman_checkout()
    {
        if (!$this->session->userdata('id')) {
            redirect('auth/login_mahasiswa');
        }

        $data['title'] = 'Warma CIC | Checkout';
        $this->paggingFrontend('frontend/checkout', $data);
    }
}
