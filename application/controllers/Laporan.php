<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends My_Controller
{
    //===========================================
    //                  PENJUAL
    //===========================================

    public function saldo_penghasilan()
    {
        $data['title'] = 'Warma CIC | Saldo Penghasilan';
        $this->paggingPenjual('penjual/laporan/saldo_penghasilan', $data);
    }
}
