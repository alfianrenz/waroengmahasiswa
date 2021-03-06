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

        $list_penjual = $this->db->select('DISTINCT(akun_mahasiswa.id_mahasiswa), mahasiswa.nama_mahasiswa')
            ->from('keranjang')
            ->join('detail_keranjang', 'keranjang.id_keranjang = detail_keranjang.id_keranjang')
            ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
            ->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa')
            ->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim')
            ->where('keranjang.id_pembeli', $this->session->userdata('id'))
            ->where('keranjang.tipe_pembeli', $this->session->userdata('tipe'))
            ->where('keranjang.status_keranjang', 0)
            ->get()->result_array();

        //Untuk ambil data detail keranjang
        $detail_keranjang = $this->db->select('*')
            ->from('keranjang')
            ->join('detail_keranjang', 'keranjang.id_keranjang = detail_keranjang.id_keranjang')
            ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
            ->where('keranjang.id_pembeli', $this->session->userdata('id'))
            ->where('keranjang.tipe_pembeli', $this->session->userdata('tipe'))
            ->where('keranjang.status_keranjang', 0)
            ->get()->result_array();

        $list_mahasiswa = [];

        foreach ($detail_keranjang as $detail) {
            $list_mahasiswa[] = $detail['id_mahasiswa'];
        }

        //Lokasi
        $lokasi = $this->db->select('*')
            ->from('lokasi')
            ->join('ongkir', 'lokasi.id_lokasi = ongkir.id_lokasi')
            ->get()->result_array();

        $data['lokasi'] = $lokasi;
        $data['list_penjual'] = $list_penjual;
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
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            header('Content-Type: application/json');
            echo json_encode(array(
                'error' => true,
                'validasi_alamat' => form_error('alamat'),
                'validasi_lokasi' => form_error('lokasi'),
                'validasi_kecamatan' => form_error('kecamatan'),
            ));
        } else {
            header('Content-Type: application/json');
            $data['ongkir'] = $this->input->post('ongkir');
            $data['jumlah_ongkir'] = $this->input->post('jumlah_ongkir');
            $transaksi = $this->checkout_model->token($data);
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

        $this->paggingFrontend('frontend/redirect', $data);
    }

    public function change_kecamatan()
    {
        $kecamatan = $this->db->get_where('kecamatan', ['id_lokasi' => $this->input->post('lokasi')])->result_array();
        // echo '<option> Pilih Kecamatan </option>';
        $response = [];
        foreach ($kecamatan as $k) {
            echo '<option value="' . $k['id_kecamatan'] . '">' . $k['nama_kecamatan'] . '</option>';
            //$response[] = $k;
        }

        //echo json_encode($response);
    }
}
