<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
    }

    //=======================================
    //                ADMIN
    //=======================================
    public function penghasilan_penjual()
    {
        $data['title'] = 'Warma CIC | Penghasilan Penjual';
        $data = [
            'penghasilan' => [],
            'tgl_awal' => "",
            'tgl_akhir' => "",
        ];
        if (isset($_GET['tgl_awal'], $_GET['tgl_akhir'])) {
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');

            $query = $this->db->select('*')
                ->from('transaksi')
                ->join('detail_keranjang', 'transaksi.id_keranjang = detail_keranjang.id_keranjang')
                ->join('produk', 'detail_keranjang.id_produk = produk.id_produk')
                ->join('keranjang', 'transaksi.id_keranjang = keranjang.id_keranjang')
                ->join('akun_mahasiswa', 'produk.id_mahasiswa = akun_mahasiswa.id_mahasiswa')
                ->join('mahasiswa', 'akun_mahasiswa.nim = mahasiswa.nim')
                ->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi')
                ->where('DATE(waktu_transaksi) >=', $tgl_awal)
                ->where('DATE(waktu_transaksi) <=', $tgl_akhir)
                ->where(['transaksi.status_pesanan' => "Selesai"])
                ->group_by('akun_mahasiswa.id_mahasiswa')
                ->order_by('mahasiswa.nama_mahasiswa', 'ASC')
                ->get()->result_array();
            //print_r($query);

            $data['penghasilan'] = $query;
            for ($i = 0; $i < count($data['penghasilan']); $i++) {
                $id = $data['penghasilan'][$i]['id_mahasiswa'];
                $data['penghasilan'][$i]['total_penghasilan'] = $this->laporan_model->hitung_penghasilan($id);
            }

            $data['tgl_awal'] = $tgl_awal;
            $data['tgl_akhir'] = $tgl_akhir;
        }
        $this->paggingAdmin('admin/penghasilan/penghasilan_penjual', $data);
    }

    public function detail_penghasilan($id)
    {
        $data['title'] = 'Warma CIC | Penjualan';
        $penjualan = $this->laporan_model->get_penjualan_id($id);
        $produk_terjual = 0;
        for ($i = 0; $i < count($penjualan); $i++) {
            $id_produk = $penjualan[$i]['id_produk'];
            $penjualan[$i]['terjual'] = $this->db->query("SELECT SUM(kuantitas) AS terjual FROM detail_keranjang JOIN keranjang USING (id_keranjang) JOIN transaksi USING (id_keranjang) WHERE id_produk = '$id_produk' AND status_pesanan = 'Selesai'")->row()->terjual;
            $produk_terjual += $penjualan[$i]['terjual'];
        }

        $data['penjualan'] = $penjualan;
        $data['produk_terjual'] = $produk_terjual;

        $id = $this->session->userdata('id');
        $data['penghasilan'] = $this->laporan_model->hitung_penghasilan($id);

        $this->paggingAdmin('admin/penghasilan/detail_penghasilan', $data);
    }


    //=======================================
    //               PENJUAL
    //=======================================
    public function info_penjualan()
    {
        $data['title'] = 'Warma CIC | Penjualan';
        $penjualan = $this->laporan_model->get_penjualan();
        $produk_terjual = 0;
        for ($i = 0; $i < count($penjualan); $i++) {
            $id_produk = $penjualan[$i]['id_produk'];
            $penjualan[$i]['terjual'] = $this->db->query("SELECT SUM(kuantitas) AS terjual FROM detail_keranjang JOIN keranjang USING (id_keranjang) JOIN transaksi USING (id_keranjang) WHERE id_produk = '$id_produk' AND status_pesanan = 'Selesai'")->row()->terjual;
            $produk_terjual += $penjualan[$i]['terjual'];
        }

        $data['penjualan'] = $penjualan;
        $data['produk_terjual'] = $produk_terjual;

        $id = $this->session->userdata('id');
        $data['penghasilan'] = $this->laporan_model->hitung_penghasilan($id);

        $this->paggingPenjual('penjual/penjualan/info_penjualan', $data);
    }

    public function detail_penjualan($id)
    {
        $data['title'] = 'Warma CIC | Penjualan';
        $data['penjualan'] = $this->laporan_model->get_detailPenjualan($id);
        $this->paggingPenjual('penjual/penjualan/detail_penjualan', $data);
    }
}
