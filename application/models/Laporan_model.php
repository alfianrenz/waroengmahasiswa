<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    //==========================================
    //                 ADMIN
    //==========================================

    public function penghasilan_penjual()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
        $this->db->where(['transaksi.status_pesanan' => "Selesai"]);
        $this->db->group_by('akun_mahasiswa.id_mahasiswa');
        return $this->db->get()->result_array();
    }


    public function hitung_penghasilan($id)
    {

        $penghasilan = 0;
        $transaksi = $this->db->select('*')
            ->from('transaksi')
            ->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang')
            ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
            ->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa')
            ->where('produk.id_mahasiswa', $id)
            ->where(['transaksi.status_pesanan' => 'Selesai'])
            ->group_by('transaksi.order_id')
            ->get()->result_array();

        foreach ($transaksi as $t) {
            $penghasilan = $penghasilan + $t['total_bayar'];
        }
        return $penghasilan;
    }


    //==========================================
    //              PENJUAL
    //==========================================

    public function get_penjualan()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        $this->db->where('produk.id_mahasiswa', $this->session->userdata('id'));
        $this->db->where(['transaksi.status_pesanan' => "Selesai"]);
        $this->db->group_by('produk.id_produk');
        return $this->db->get()->result_array();
    }
}
