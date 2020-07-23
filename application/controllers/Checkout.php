<?php

use phpDocumentor\Reflection\Types\True_;

defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . '/midtrans/Midtrans.php');

class Checkout extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkout_model');
    }

    // =========================================
    //              CHECKOUT MIDTRANS
    //==========================================

    //Halaman Checkout
    public function index()
    {
        if (!$this->session->userdata('id')) {
            redirect('auth/login_mahasiswa');
        }

        $data['title'] = 'Warma CIC | Checkout';
        $data['detail_keranjang'] = $this->checkout_model->getdetail_keranjang();
        $this->paggingFrontend('frontend/checkout', $data);
    }

    //Get Token Midtrans
    public function getToken()
    {
        $this->form_validation->set_rules('kota', 'kota', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kurir', 'kurir', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            header('Content-Type: application/json');
            echo json_encode(array(
                'error' => true,
                'validasi_alamat' => form_error('alamat'),
                'validasi_kota' => form_error('kota'),
                'validasi_kurir' => form_error('kurir')
            ));
        } else {
            header('Content-Type: application/json');
            $transaksi = $this->checkout_model->token();
            echo json_encode(array('error' => false, 'token' => $transaksi));
        }
    }

    //Halaman callback
    public function callback()
    {
        $data = json_decode(file_get_contents('php://input'));

        $status_bayar = $data->transaction_status;
        $order_id = $data->order_id;
        $payment_type = $data->payment_type;
        $payment_code = $data->payment_code;
        $transaction_time = $data->transaction_time;
        $gross_amount = $data->gross_amount;
        $store = $data->store;

        //Update status pesanan
        if ($data->transaction_status == 'pending') {
            $status_pesanan = 'Belum Bayar';
        } else if ($data->transaction_status == 'settlement') {
            $status_pesanan = 'Diproses';
        } else {
            $status_pesanan = 'Gagal';
        }

        $data = [
            'status_bayar'     => $status_bayar,
            'tipe_pembayaran'  => $payment_type,
            'kode_pembayaran'  => $payment_code,
            'waktu_transaksi'  => $transaction_time,
            'total_bayar'      => $gross_amount,
            'store'            => $store,
            'status_pesanan'   => $status_pesanan,
        ];

        //insert database
        if ($status_bayar == 'pending') {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        } else if ($status_bayar == 'settlement') {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        } else if ($status_bayar == 'capture') {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        } else if ($status_bayar == 'challenge') {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        } else {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        }
    }

    public function redirect()
    {
        // $data = json_decode(file_get_contents('php://input'));
        $order_id = $this->input->get('order_id');
        $data['transaksi'] = $this->db->get_where('transaksi', ['order_id' => $order_id])->row();

        // $detail_keranjang = $this->db->get('detail_keranjang')->row_array();

        // //hapus detail_keranjang
        // $this->db->where('id_keranjang', $detail_keranjang['id_keranjang']);
        // $this->db->delete('detail_keranjang');

        // //hapus_keranjang
        // $this->db->where('id_keranjang', $detail_keranjang['id_keranjang']);
        // $this->db->delete('keranjang');

        $this->paggingFrontend('frontend/redirect', $data);
    }
}
