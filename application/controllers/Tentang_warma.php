<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang_warma extends My_Controller
{
    public function index()
    {
        $data['title'] = 'Warma CIC | Tentang Warma';
        $this->paggingFrontend('frontend/tentang_warma', $data);
    }
}
