<?php
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

    //halaman checkout
    public function index()
    {
        if (!$this->session->userdata('id')) {
            redirect('auth/login_mahasiswa');
        }

        $data['title'] = 'Warma CIC | Checkout';
        $data['detail_keranjang'] = $this->checkout_model->getdetail_keranjang();

        $this->paggingFrontend('frontend/checkout', $data);
    }

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
            // $this->paggingFrontend('frontend/checkout', $data);
            header('Content-Type: application/json');
            echo json_encode(array(
                'error' => true,
                'validasi_alamat' => form_error('alamat'),
                'validasi_kota' => form_error('kota'),
                'validasi_kode_pos' => form_error('kode_pos')
            ));
        } else {
            header('Content-Type: application/json');
            $transaksi = $this->checkout_model->dataOrder();
            echo json_encode(array('error' => false, 'token' => $transaksi));
        }
    }


    public function callback()
    {
        // $data['title'] = 'Warma CIC |Callback';
        // $this->paggingFrontend('frontend/callback', $data);
        // Set your Merchant Server Key

        // \Midtrans\Config::$serverKey = 'SB-Mid-server-kbDhOYnPE-xqkkyHUaPf4kKy';
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $notif = new \Midtrans\Notification();

        // $transaction = $notif->transaction_status;
        // $fraud = $notif->fraud_status;


        // $transaction = $this->input->get('transaction_status');


        // log_message("Order ID $notif->order_id: " . "transaction status = $transaction, fraud staus = $fraud", false);

        // if ($transaction == 200) {
        //     if ($fraud == 'challenge') {
        //         // TODO Set payment status in merchant's database to 'challenge
        //         $data = [
        //             'status_pesanan' => 'challenge'
        //         ];
        //         $this->db->where('id_pesanan', $notif);
        //         $this->db->update('transaksi', $data);
        //     } else if ($fraud == 'accept') {
        //         // TODO Set payment status in merchant's database to 'success'
        //         $data = [
        //             'status_pesanan' => 'success'
        //         ];
        //         $this->db->where('id_pesanan', $notif);
        //         $this->db->update('transaksi', $data);
        //     }
        // } else if ($transaction == 'cancel') {
        //     if ($fraud == 'challenge') {
        //         // TODO Set payment status in merchant's database to 'failure'
        //         $data = [
        //             'status_pesanan' => 'failure'
        //         ];
        //         $this->db->where('id_pesanan', $notif);
        //         $this->db->update('transaksi', $data);
        //     } else if ($fraud == 'accept') {
        //         // TODO Set payment status in merchant's database to 'failure'
        //         $data = [
        //             'status_pesanan' => 'failure'
        //         ];
        //         $this->db->where('id_pesanan', $notif);
        //         $this->db->update('transaksi', $data);
        //     }
        // } else if ($transaction == 'deny') {
        //     // TODO Set payment status in merchant's database to 'failure'
        //     $data = [
        //         'status_pesanan' => 'failure'
        //     ];
        //     $this->db->where('id_pesanan', $notif);
        //     $this->db->update('transaksi', $data);
        // }

        // $data = [
        //     'status_pesanan' => 'settlement'
        // ];

        $transaction = $this->input->get('status_code');
        $notif = $this->input->get('order_id');
        $data = [
            'status_pesanan' => $this->input->get('transaction_status')
        ];

        if ($transaction == 200) {
            $this->db->where('id_pesanan', $notif);
            $this->db->update('transaksi', $data);


            $this->paggingFrontend('frontend/callback', $data);
        } else {
            $this->paggingFrontend('frontend/error', $data);
        }
    }

    // public function invoice()
    // {
    //     if (!$this->session->userdata('id')) {
    //         redirect('auth/login_mahasiswa');
    //     }

    //     $data['title'] = 'Warma CIC | Invoice';
    //     $this->paggingFrontend('frontend/invoice', $data);
    // }
}
