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
        $this->form_validation->set_rules('kode_pos', 'kode_pos', 'required|trim|numeric', [
            'required' => 'Form ini tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka'
        ]);

        if ($this->form_validation->run() == FALSE) {
            header('Content-Type: application/json');
            echo json_encode(array(
                'error' => true,
                'validasi_alamat' => form_error('alamat'),
                'validasi_kota' => form_error('kota'),
                'validasi_kode_pos' => form_error('kode_pos')
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

        $status = $data->transaction_status;
        $order_id = $data->order_id;
        $payment_type = $data->payment_type;
        $payment_code = $data->payment_code;
        $transaction_time = $data->transaction_time;
        $gross_amount = $data->gross_amount;

        $data = [
            'status_pesanan'   => $status,
            'payment_type'     => $payment_type,
            'payment_code'     => $payment_code,
            'transaction_time' => $transaction_time,
            'gross_amount'     => $gross_amount
        ];

        //insert database
        if ($status == 'pending') {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        } else if ($status == 'capture') {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        }
        else if ($status == 'deny') {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        }
        else if ($status == 'challenge') {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        }
        else {
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        }

        // $this->paggingFrontend('frontend/callback', $data);

        // $transaction = $this->input->get('status_code');
        // $notif = $this->input->get('order_id');
        // $data = [
        //     'status_pesanan' => $this->input->get('transaction_status')
        // ];

        // if ($transaction == 200) {
        //     $this->db->where('id_pesanan', $notif);
        //     $this->db->update('transaksi', $data);
        //     $this->paggingFrontend('frontend/callback', $data);
        // } else {
        //     $this->paggingFrontend('frontend/error', $data);
        // }
    }

    public function redirect()
    {
        // $data = json_decode(file_get_contents('php://input'));
        $order_id = $this->input->get('order_id');
        $data['data'] = $this->db->get_where('transaksi', ['order_id' => $order_id])->row();

        $this->paggingFrontend('frontend/redirect', $data);
        // $transaction = $this->input->get('status_code');

        // $order_id = $this->input->get('order_id');
        // $data = [
        //     'status_pesanan' => $this->input->get('transaction_status')
        // ];

        // if ($transaction == 200) {
        //     $this->db->where('id_pesanan', $order_id);
        //     // $this->db->update('transaksi', $data);
        //     $this->paggingFrontend('frontend/callback', $data);
        // } else {
        //     $this->paggingFrontend('frontend/error', $data);
        // }
    }
}
