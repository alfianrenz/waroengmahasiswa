<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . '/midtrans/Midtrans.php');

class Checkout_model extends CI_Model
{
    //get data detail keranjang
    public function getdetail_keranjang()
    {
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->join('detail_keranjang', 'keranjang.id_keranjang = detail_keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->where('keranjang.id_pembeli', $this->session->userdata('id'));
        $this->db->where('keranjang.tipe_pembeli', $this->session->userdata('tipe'));
        $this->db->where('keranjang.status_keranjang', 0);
        return $this->db->get()->result_array();
    }

    //=======================================
    //                MIDTRANS
    //=======================================

    //get token midtrans
    public function token($ongkir)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-kbDhOYnPE-xqkkyHUaPf4kKy';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        //detail keranjang
        $produk = $this->getdetail_keranjang();

        $total_bayar = 0;
        $order_id = rand();

        //kabupaten/lokasi
        $input = $this->input->post('lokasi');
        $lokasi = $this->db->select('*')
            ->from('lokasi')
            ->where('id_lokasi', $input)
            ->get()->row_array();

        // subtotal dan total belanja
        foreach ($produk as $p) {
            $harga_produk = $p['harga_produk'];
            $kuantitas = $p['kuantitas'];
            $subtotal = $harga_produk * $kuantitas;
            $total_bayar += $subtotal;
        }


        // $total_belanja = $this->input->post('ongkir');

        //required
        $transaction_details = [
            'order_id' => $order_id,
            'gross_amount' => $total_bayar
        ];

        //produk
        $item_details = [];
        foreach ($produk as $p) {
            $item_details[] = [
                'id' => $p['id_detail'],
                'price' => $p['harga_produk'],
                'quantity' => $p['kuantitas'],
                'name' => $p['nama_produk']
            ];
        }

        //ongkir
        $item_details[] = [
            'id' => rand(),
            'price' => $ongkir,
            'quantity' => 1,
            'name' => 'Ongkos Kirim'
        ];

        // Optional
        $billing_address = array(
            'first_name'    => $this->session->userdata('nama'),
            'address'       => $this->input->post('alamat'),
            'city'          => $lokasi['nama_lokasi'],
            'phone'         => $this->session->userdata('telepon')
        );

        // Optional
        $shipping_address = array(
            'first_name'    => $this->session->userdata('nama'),
            'address'       => $this->input->post('alamat'),
            'city'          => $lokasi['nama_lokasi'],
            'phone'         => $this->session->userdata('telepon')
        );

        // Optional
        $customer_details = array(
            'first_name'    => $this->session->userdata('nama'),
            'email'         => $this->session->userdata('email'),
            'phone'         => $this->session->userdata('telepon'),
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        $enable_payments = [
            'credit_card', 'alfamart', 'bca_klikbca', 'bri_epay', 'echannel', 'permata_va', 'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret'
        ];

        $transaction_data = [
            'enabled_payments'    => $enable_payments,
            'customer_details'    => $customer_details,
            'item_details'        => $item_details,
            'transaction_details' => $transaction_details,
            'billing_address'     => $billing_address,
            'shipping_address'    => $shipping_address
        ];

        //Insert database
        $data_transaksi = [
            'order_id'          => $order_id,
            'id_pembeli'        => $produk[0]['id_pembeli'],
            'tipe_pembeli'      => $this->session->userdata('tipe'),
            'nama_pelanggan'    => $this->session->userdata('nama'),
            'email_pelanggan'   => $this->session->userdata('email'),
            'alamat_pelanggan'  => $this->input->post('alamat'),
            'telepon_pelanggan' => $this->session->userdata('telepon'),
            'kota_pelanggan'    => $lokasi['nama_lokasi'],
            'id_keranjang'      => $produk[0]['id_keranjang'],
            'jumlah_ongkir'     => $ongkir,
            'total_bayar'       => $total_bayar,
            'status_bayar'      => 'pending',
        ];
        $this->db->insert('transaksi', $data_transaksi);

        $snapToken = \Midtrans\Snap::getSnapToken($transaction_data);
        return $snapToken;
    }


    //=======================================
    //                 ADMIN
    //=======================================

    //get All data transaksi
    public function getAll_transaksi($sortby)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('keranjang', 'transaksi.id_keranjang = keranjang.id_keranjang');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        if ($sortby == "settlement") {
            $this->db->where(['status_bayar' => 'settlement']);
        } else if ($sortby == "pending") {
            $this->db->where(['status_bayar' => 'pending']);
        } else if ($sortby == "failure") {
            $this->db->where(['status_bayar' => 'expire']);
        }
        $this->db->order_by('waktu_transaksi', 'DESC');
        return $this->db->get()->result_array();
    }

    //get detail transaksi admin
    public function detail_transaksiAdmin($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('order_id', $id);
        return $this->db->get()->row_array();
    }

    //get detail item
    public function detail_itemAdmin($id)
    {
        $this->db->select('*');
        $this->db->from('detail_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        $this->db->join('transaksi', 'detail_keranjang.id_keranjang = transaksi.id_keranjang');
        $this->db->where('transaksi.order_id', $id);
        return $this->db->get()->result_array();
    }



    //========================================
    //                PENJUAL
    //========================================

    public function getTransaksi_penjual($sortby)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        if ($sortby == "belum_bayar") {
            $this->db->where(['status_pesanan' => 'Belum Bayar']);
        } else if ($sortby == "diproses") {
            $this->db->where(['status_pesanan' => 'Diproses']);
        } else if ($sortby == "dikirim") {
            $this->db->where(['status_pesanan' => 'Dikirim']);
        } else if ($sortby == "selesai") {
            $this->db->where(['status_pesanan' => 'Selesai']);
        }
        $this->db->where('produk.id_mahasiswa', $this->session->userdata('id'));
        $this->db->order_by('transaksi.waktu_transaksi', 'DESC');
        $this->db->group_by('transaksi.order_id');
        return $this->db->get()->result_array();
    }

    //get detail transaksi
    public function getDetail_transaksiPenjual($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('order_id', $id);
        return $this->db->get()->row_array();
    }

    //get detail item
    public function detailitem_Penjual($id)
    {
        $this->db->select('*');
        $this->db->from('detail_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('transaksi', 'detail_keranjang.id_keranjang = transaksi.id_keranjang');
        $this->db->where('produk.id_mahasiswa', $this->session->userdata('id'));
        $this->db->where('transaksi.order_id', $id);
        return $this->db->get()->result_array();
    }

    //input pengiriman
    public function input_pengiriman($id)
    {
        $data = [
            'status_pesanan' => 'Dikirim'
        ];
        $this->db->where('order_id', $id);
        $this->db->update('transaksi', $data);
    }

    //jumlah pesanan (dashboard)
    public function jumlah_pesanan()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        $this->db->where('produk.id_mahasiswa', $this->session->userdata('id'));
        $this->db->group_by('transaksi.order_id');
        return $this->db->get()->num_rows();
    }

    //belum bayar (dashboard)
    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        $this->db->where('produk.id_mahasiswa', $this->session->userdata('id'));
        $this->db->where('transaksi.status_pesanan', 'Belum Bayar');
        $this->db->group_by('transaksi.order_id');
        return $this->db->get()->num_rows();
    }


    //diproses (dashboard)
    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        $this->db->where('produk.id_mahasiswa', $this->session->userdata('id'));
        $this->db->where('transaksi.status_pesanan', 'Diproses');
        $this->db->group_by('transaksi.order_id');
        return $this->db->get()->num_rows();
    }


    //========================================
    //                PEMBELI
    //========================================

    //get data transaksi berdasarkan id mahasiswa
    public function getTransaksi_pembeli($sortby)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        if ($sortby == "belum_bayar") {
            $this->db->where(['status_pesanan' => 'Belum Bayar']);
        } else if ($sortby == "diproses") {
            $this->db->where(['status_pesanan' => 'Diproses']);
        } else if ($sortby == "dikirim") {
            $this->db->where(['status_pesanan' => 'Dikirim']);
        } else if ($sortby == "selesai") {
            $this->db->where(['status_pesanan' => 'Selesai']);
        }
        $this->db->order_by('waktu_transaksi', 'DESC');
        $this->db->where('id_pembeli', $this->session->userdata('id'));
        return $this->db->get()->result_array();
    }

    //Detail transaksi bagian pembeli
    public function getDetail_transaksi($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('order_id', $id);
        return $this->db->get()->row_array();
    }

    //get detail item
    public function detailitem_Pembeli($id)
    {
        $this->db->select('*');
        $this->db->from('detail_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa');
        $this->db->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim');
        $this->db->join('transaksi', 'detail_keranjang.id_keranjang = transaksi.id_keranjang');
        $this->db->where('transaksi.id_pembeli', $this->session->userdata('id'));
        $this->db->where('transaksi.order_id', $id);
        return $this->db->get()->result_array();
    }

    //konfirmasi barang
    public function konfirmasi_barang($id)
    {
        $data = [
            'status_pesanan' => 'Selesai'
        ];
        $this->db->where('order_id', $id);
        $this->db->update('transaksi', $data);
    }
}
