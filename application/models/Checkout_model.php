<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . '/midtrans/Midtrans.php');

class Checkout_model extends CI_Model
{
    //get data detail keranjang
    public function getdetail_keranjang()
    {
        $this->db->select('*');
        $this->db->from('detail_keranjang');
        $this->db->join('keranjang', 'detail_keranjang.id_keranjang = keranjang.id_keranjang');
        $this->db->join('produk', 'detail_keranjang.id_produk = produk.id_produk');
        $this->db->where('id_pembeli', $this->session->userdata('id'));
        return $this->db->get()->result_array();
    }

    //data order untuk checkout ke midtrans
    public function dataOrder()
    {
        // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = 'SB-Mid-server-kbDhOYnPE-xqkkyHUaPf4kKy';
        \Midtrans\Config::$serverKey = 'SB-Mid-server-B_hy-Sg8R6YVJ9oLmHqaQoia';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        //Data detail keranjang
        $produk = $this->getdetail_keranjang();
        $total_belanja = 0;

        //hitung subtotal dan total belanja
        foreach ($produk as $p) {
            $harga_produk = $p['harga_produk'];
            $kuantitas = $p['kuantitas'];
            $subtotal = $harga_produk * $kuantitas;
            $total_belanja += $subtotal;
        }

        // var_dump($produk);
        // die;
        //data transaksi
        $transaction_details = [
            'order_id' => rand(),
            'gross_amount' => $total_belanja
        ];

        //produk
        $item_details = [];
        foreach ($produk as $p) {
            $item_details[] = [
                'id' => $p['id_detail'],
                'price' => $subtotal * $p['kuantitas'],
                'quantity' => $p['kuantitas'],
                'name' => $p['nama_produk']
            ];
        }

        //customer detail, billing address, shipping address
        $data = [
            'first_name'  => $this->session->userdata('nama'),
            'email'       => $this->session->userdata('email'),
            'address'     => $this->input->post('alamat'),
            'postal_code' => $this->input->post('kode_pos'),
            'city'        => $this->input->post('kota'),
            'phone'       => $this->session->userdata('telepon'),
        ];

        $customer_details = $data;
        $billing_address = $data;
        $shipping_address = $data;


        $enable_payments = [
            'credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel', 'alfamart', 'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va', 'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret', 'danamon_online', 'akulaku'
        ];

        $transaction = [
            'enabled_payments'    => $enable_payments,
            'customer_details'    => $customer_details,
            'item_details'        => $item_details,
            'transaction_details' => $transaction_details,
            'billing_address'     => $billing_address,
            'shipping_address'    => $shipping_address
        ];

        $data = [
            'id_pesanan'        => $transaction_details['order_id'],
            'nama_pelanggan'    => $this->session->userdata('nama'),
            'email_pelanggan'   => $this->session->userdata('email'),
            'alamat_pelanggan'  => $this->input->post('alamat'),
            'kota_pelanggan'    => $this->input->post('kota'),
            'kode_pos'          => $this->input->post('kode_pos'),
            'telepon_pelanggan' => $this->session->userdata('telepon'),
            'total_belanja'     => $total_belanja,
            'status_pesanan'    => 'pending'
        ];

        $this->db->insert('transaksi', $data);

        $snapToken = \Midtrans\Snap::getSnapToken($transaction);
        return $snapToken;
    }
}
