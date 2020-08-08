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

        //Lokasi
        $lokasi = $this->db->select('*')
            ->from('lokasi')
            ->join('ongkir', 'lokasi.id_lokasi = ongkir.id_lokasi')
            ->get()->result_array();

        $data['lokasi'] = $lokasi;
        $this->paggingFrontend('frontend/checkout', $data);
    }

    //Get Token Midtrans
    public function getToken()
    {
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jumlah_ongkir', 'jumlah_ongkir', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            header('Content-Type: application/json');
            echo json_encode(array(
                'error' => true,
                'validasi_alamat' => form_error('alamat'),
                'validasi_lokasi' => form_error('lokasi'),
                'validasi_ongkir' => form_error('jumlah_ongkir'),
            ));
        } else {
            header('Content-Type: application/json');
            $ongkir = $this->input->post('jumlah_ongkir');
            $transaksi = $this->checkout_model->token($ongkir);
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

        $payment_code = '';
        $store = '';

        if (isset($data->payment_code)) {
            $payment_code = $data->payment_code;
            $store = $data->store;
        }
        $transaction_time = $data->transaction_time;
        $gross_amount = $data->gross_amount;


        if (count($data->va_numbers)) {
            $bank = $data->va_numbers[0]->bank;
            $va_number = $data->va_numbers[0]->va_number;
        }

        // var_dump(count($data->va_numbers));
        // die();

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
            'nama_bank'        => $bank,
            'va_number'        => $va_number
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
        $order_id = $this->input->get('order_id');
        $data['transaksi'] = $this->db->get_where('transaksi', ['order_id' => $order_id])->row();

        $this->db->where('id_keranjang', $data['transaksi']->id_keranjang);
        $this->db->update('keranjang', ['status_keranjang' => 1]);

        // $detail_keranjang = $this->db->get_where('detail_keranjang', ['id_keranjang' => $data['transaksi']->id_keranjang])->result_array();

        // $list_product = [];

        // foreach ($detail_keranjang as $detail) {
        //     $list_product[] = $detail['id_produk'];
        // }

        // $produk = $this->db->select('*')
        //     ->from('produk')
        //     ->where_in('id_produk', $list_product)
        //     ->get()->result_array();

        // if ($data['transaksi'])
        //     for ($i = 0; $i < count($produk); $i++) {
        //         $total_stok_akhir = $produk[$i]['stok_produk'] - $detail_keranjang[$i]['kuantitas'];
        //         $total_terjual_akhir = $produk[$i]['terjual'] + $detail_keranjang[$i]['kuantitas'];

        //         $this->db->where('id_produk', $produk[$i]['id_produk']);
        //         $this->db->update('produk', ['stok_produk' => $total_stok_akhir, 'terjual' => $total_terjual_akhir]);
        //     }

        $this->paggingFrontend('frontend/redirect', $data);
    }
}
