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

    //get token midtrans
    public function token()
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
        $total_belanja = 0;

        //subtotal dan total belanja
        foreach ($produk as $p) {
            $harga_produk = $p['harga_produk'];
            $kuantitas = $p['kuantitas'];
            $subtotal = $harga_produk * $kuantitas;
            $total_belanja += $subtotal;
        }

        //required
        $transaction_details = [
            'order_id' => rand(),
            'gross_amount' => $total_belanja
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

        // Optional
        $billing_address = array(
            'first_name'    => $this->session->userdata('nama'),
            'address'       => $this->input->post('alamat'),
            'city'          => $this->input->post('kota'),
            'postal_code'   => $this->input->post('kode_pos'),
            'phone'         => $this->session->userdata('telepon')
        );

        // Optional
        $shipping_address = array(
            'first_name'    => $this->session->userdata('nama'),
            'address'       => $this->input->post('alamat'),
            'city'          => $this->input->post('kota'),
            'postal_code'   => $this->input->post('kode_pos'),
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
            'credit_card', 'alfamart', 'bri_epay', 'echannel', 'permata_va', 'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret'
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
            'order_id'          => $transaction_details['order_id'],
            'nama_pelanggan'    => $this->session->userdata('nama'),
            'email_pelanggan'   => $this->session->userdata('email'),
            'alamat_pelanggan'  => $this->input->post('alamat'),
            'kota_pelanggan'    => $this->input->post('kota'),
            'kode_pos'          => $this->input->post('kode_pos'),
            'telepon_pelanggan' => $this->session->userdata('telepon'),
            'total_belanja'     => $total_belanja,
            'status_pesanan'    => 'pending'
        ];
        $this->db->insert('transaksi', $data_transaksi);

        $snapToken = \Midtrans\Snap::getSnapToken($transaction_data);
        return $snapToken;
    }
}
