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
        $payment_code = $data->payment_code;
        $transaction_time = $data->transaction_time;
        $gross_amount = $data->gross_amount;
        $store = $data->store;
        // $bank = $data->va_numbers['bank'];
        // $va_number = $data->va_numbers['va_number'];

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
            // 'nama_bank'        => $bank,
            // 'va_number'        => $va_number
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

        //transaksi
        $transaksi = $this->db->select('*')
            ->from('transaksi')
            ->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang')
            ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
            ->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa')
            ->where('transaksi.order_id', $order_id)
            ->get()->row();


        //item
        $item = $this->db->select('*')
            ->from('detail_keranjang')
            ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
            ->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa')
            ->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim')
            ->join('transaksi', 'detail_keranjang.id_keranjang = transaksi.id_keranjang')
            ->where('transaksi.id_pembeli', $this->session->userdata('id'))
            ->where('transaksi.order_id', $order_id)
            ->get()->result_array();


        // $data['transaksi'] = $this->db->get_where('transaksi', ['order_id' => $order_id])->row();
        $data['transaksi'] = $transaksi;
        $data['item'] = $item;

        // $id = $this->db->get('keranjang')->row_array();
        $this->db->where('id_keranjang', $data['transaksi']->id_keranjang);
        $this->db->update('keranjang', ['status_keranjang' => 1]);

        $this->paggingFrontend('frontend/invoice', $data);
    }
}
