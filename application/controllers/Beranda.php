<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends My_Controller
{
    public function index()
    {
        $data['title'] = 'Warma CIC | Beranda';
        $this->paggingFrontend('frontend/beranda', $data);
    }
}
