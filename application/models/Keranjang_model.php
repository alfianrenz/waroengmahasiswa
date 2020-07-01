<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
    //tambahkan ke keranjang
    public function tambahKeranjang($id)
    {
        $data = [
            'id_produk' => $id,
            'id_mahasiswa' => $id,
            'kuantitas' => 1,
            'subtotal' => 1,
            'total_belanja' => 1
        ];
        $this->db->insert('keranjang', $data);
    }
}
