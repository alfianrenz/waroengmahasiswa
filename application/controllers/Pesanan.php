<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkout_model');
    }

    //========================================
    //                PENJUAL
    //========================================

    public function daftar_pesanan_penjual($sortby = '')
    {
        $data['title'] = 'Warma CIC | Pesanan';
        $data['transaksi'] = $this->checkout_model->getTransaksi_penjual($sortby);
        $this->paggingPenjual('penjual/pesanan/daftar_pesanan', $data);
    }

    public function detail_pesanan_penjual($id)
    {
        $data['title'] = 'Warma CIC | Detail Pesanan';
        $data['transaksi'] = $this->checkout_model->getDetail_transaksiPenjual($id);
        $data['item'] = $this->checkout_model->detailitem_Penjual($id);
        $this->paggingPenjual('penjual/pesanan/detail_pesanan', $data);
    }

    public function input_pengiriman($id)
    {
        $this->checkout_model->input_pengiriman($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-inputpengiriman="Produk sedang dikirim"></div>');
        echo '<script>window.history.back();</script>';
    }

    //========================================
    //                PEMBELI
    //========================================

    public function daftar_pesanan_pembeli($sortby = '')
    {
        $data['title'] = 'Warma CIC | Pesanan';
        $data['transaksi'] = $this->checkout_model->getTransaksi_pembeli($sortby);
        $this->paggingPembeli('pembeli/pesanan/daftar_pesanan', $data);
    }

    //get detail pesanan
    public function detail_pesanan_pembeli($id)
    {
        $data['title'] = 'Warma CIC | Detail Pesanan';
        $data['transaksi'] = $this->checkout_model->getDetail_transaksi($id);
        // $data['item'] = $this->checkout_model->detailitem_Pembeli($id);


        $list_penjual = $this->db->select('DISTINCT(akun_mahasiswa.id_mahasiswa), mahasiswa.nama_mahasiswa')
            ->from('keranjang')
            ->join('detail_keranjang', 'keranjang.id_keranjang = detail_keranjang.id_keranjang')
            ->join('transaksi', 'detail_keranjang.id_keranjang = transaksi.id_keranjang')
            ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
            ->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa')
            ->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim')
            ->where('keranjang.id_pembeli', $this->session->userdata('id'))
            ->where('keranjang.tipe_pembeli', $this->session->userdata('tipe'))
            ->where('transaksi.order_id', $id)
            ->get()->result_array();

        //Untuk ambil data detail keranjang
        $detail_keranjang = $this->db->select('*')
            ->from('keranjang')
            ->join('detail_keranjang', 'keranjang.id_keranjang = detail_keranjang.id_keranjang')
            ->join('transaksi', 'detail_keranjang.id_keranjang = transaksi.id_keranjang')
            ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
            ->where('keranjang.id_pembeli', $this->session->userdata('id'))
            ->where('keranjang.tipe_pembeli', $this->session->userdata('tipe'))
            ->where('transaksi.order_id', $id)
            ->get()->result_array();

        $list_mahasiswa = [];

        foreach ($detail_keranjang as $detail) {
            $list_mahasiswa[] = $detail['id_mahasiswa'];
        }

        $data['list_penjual'] = $list_penjual;
        $data['detail_keranjang'] = $detail_keranjang;
        $this->paggingPembeli('pembeli/pesanan/detail_pesanan', $data);
    }

    public function konfirmasi_barang($id)
    {
        $order_id = $id;
        $data['transaksi'] = $this->db->get_where('transaksi', ['order_id' => $order_id])->row();

        $detail_keranjang = $this->db->get_where('detail_keranjang', ['id_keranjang' => $data['transaksi']->id_keranjang])->result_array();

        $list_product = [];

        foreach ($detail_keranjang as $detail) {
            $list_product[] = $detail['id_produk'];
        }

        $produk = $this->db->select('*')
            ->from('produk')
            ->where_in('id_produk', $list_product)
            ->get()->result_array();

        for ($i = 0; $i < count($produk); $i++) {
            $total_stok_akhir = $produk[$i]['stok_produk'] - $detail_keranjang[$i]['kuantitas'];
            $total_terjual_akhir = $produk[$i]['terjual'] + $detail_keranjang[$i]['kuantitas'];

            $this->db->where('id_produk', $produk[$i]['id_produk']);
            $this->db->update('produk', ['stok_produk' => $total_stok_akhir, 'terjual' => $total_terjual_akhir]);
        }

        $this->checkout_model->konfirmasi_barang($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-konfirmasibarang="Barang telah diterima"></div>');
        echo '<script>window.history.back();</script>';
    }

    public function cancel_pesanan($id)
    {
        $this->checkout_model->cancel_pesanan($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-cancelpesanan="Pesanan Berhasil Dibatalkan"></div>');
        echo '<script>window.history.back();</script>';
    }
}
