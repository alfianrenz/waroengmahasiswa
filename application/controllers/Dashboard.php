<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkout_model');
        $this->load->model('user_model');
        $this->load->model('laporan_model');
    }

    //DASHBOARD ADMIN
    public function index($sortby = '')
    {
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $data['title'] = 'Warma CIC | Dashboard';
        $data['jumlahakunmahasiswa'] = $this->db->get('akun_mahasiswa')->num_rows();
        $data['jumlahtransaksi'] = $this->db->get('transaksi')->num_rows();
        $data['mahasiswa'] = $this->user_model->getAkun_Mahasiswa();
        $data['transaksi'] = $this->checkout_model->getAll_transaksi($sortby);

        $volume = 0;
        $transaksi = $this->checkout_model->volume_transaksi();
        foreach ($transaksi as $t) {
            $t['total_bayar'];
            $volume = $volume + $t['total_bayar'];
        }
        $data['volume'] = $volume;

        $this->paggingAdmin('admin/dashboard/dashboard', $data);
    }

    //DASHBOARD PENJUAL
    public function penjual($sortby = '')
    {
        $data['title'] = 'Warma CIC | Dashboard Penjual';
        $data['transaksi'] = $this->checkout_model->getTransaksi_penjual($sortby);
        $data['jml_pesanan'] = $this->checkout_model->jumlah_pesanan();
        $data['belum_bayar'] = $this->checkout_model->belum_bayar();
        $data['diproses'] = $this->checkout_model->diproses();

        $penjualan = $this->laporan_model->get_penjualan();
        $produk_terjual = 0;
        for ($i = 0; $i < count($penjualan); $i++) {
            $id_produk = $penjualan[$i]['id_produk'];
            $penjualan[$i]['terjual'] = $this->db->query("SELECT SUM(kuantitas) AS terjual FROM detail_keranjang JOIN keranjang USING (id_keranjang) JOIN transaksi USING (id_keranjang) WHERE id_produk = '$id_produk' AND status_pesanan = 'Selesai'")->row()->terjual;
            $produk_terjual += $penjualan[$i]['terjual'];
        }

        //Penghasilan
        $penghasilan = 0;
        // $transaksi = $this->db->get_where('transaksi', ['status_pesanan' => 'Selesai'])->result_array();

        $transaksi = $this->db->select('*')
            ->from('transaksi')
            ->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang')
            ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
            ->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa')
            ->where('produk.id_mahasiswa', $this->session->userdata('id'))
            ->where(['transaksi.status_pesanan' => 'Selesai'])
            ->group_by('transaksi.order_id')
            ->get()->result_array();

        foreach ($transaksi as $t) {
            $penghasilan = $penghasilan + $t['total_bayar'];
        }
        $data['penghasilan'] = $penghasilan;
        $data['produk_terjual'] = $produk_terjual;

        $this->paggingPenjual('penjual/dashboard/dashboard', $data);
    }

    //DASHBOARD PEMBELI
    public function pembeli($sortby = '')
    {
        $data['title'] = 'Warma CIC | Dashboard Pembeli';
        $data['transaksi'] = $this->checkout_model->getTransaksi_pembeli($sortby);

        $data['jumlahpesanan'] = $this->db->get_where('transaksi', ['id_pembeli' => $this->session->userdata('id')])->num_rows();

        $data['belumbayar'] = $this->db->get_where('transaksi', ['id_pembeli' => $this->session->userdata('id'), 'status_pesanan' => 'Belum Bayar'])->num_rows();

        $data['dikirim'] = $this->db->get_where('transaksi', ['id_pembeli' => $this->session->userdata('id'), 'status_pesanan' => 'Dikirim'])->num_rows();

        $data['selesai'] = $this->db->get_where('transaksi', [
            'id_pembeli' => $this->session->userdata('id'),
            'status_pesanan' => 'Selesai'
        ])->num_rows();

        $this->paggingPembeli('pembeli/dashboard/dashboard', $data);
    }
}
