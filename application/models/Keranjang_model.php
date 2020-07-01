<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
    //tambahkan ke keranjang
    public function tambahKeranjang($id)
    {
        $id_pembeli = $this->session->userdata('id');

        //Insert ke tabel keranjang
        $data_keranjang = [
            'id_pembeli' => $id_pembeli,
            'status_pembeli' => $this->session->userdata('tipe'),
            'total_belanja' => 0
        ];
        $this->db->insert("keranjang", $data_keranjang);
        $id_keranjang = $this->db->insert_id();

        //Insert ke tabel detail_keranjang
        $detail_keranjang = [
            'id_keranjang' => $id_keranjang,
            'id_produk' => $id,
            'kuantitas' => 1,
            'subtotal' => 0
        ];
        $this->db->insert('detail_keranjang', $detail_keranjang);
    }

    public function update_kuantitas($id_detail, $kuantitas)
    {
        $this->db->where('id_detail', $id_detail)
            ->update('detail_keranjang', [
                'kuantitas' => $kuantitas
            ]);
    }
}
