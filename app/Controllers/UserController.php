<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    protected $db;
    protected $cart;


    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->cart = \Config\Services::cart();
    }

    public function index()
    {
        return view('user/home');
    }

    public function transaksi()
    {
        return view('user/transaksi', [
            'data' => $this->db->table('transaksi')->where('id_customer', session()->get('id_customer'))->orderBy('id_transaksi', 'DESC')->get()->getResultArray()
        ]);
    }

    public function invoice($id)
    {
        return view('user/invoice', [
            'dataTransaksi' => $this->db->table('transaksi')->where('id_transaksi', $id)->get()->getRowArray(),
            'dataDetail' => $this->db->table('transaksi_detail')->where('id_transaksi', $id)->get()->getResultArray(),
            'dataToko' => $this->db->table('toko_informasi')->where('id_toko', '1')->get()->getRowArray(),
            'dataUser' => $this->db->table('customer')->where('id_customer', session()->get('id_customer'))->get()->getRowArray()
        ]);
    }

    public function checkout()
    {
        helper('text');

        $home = new Home;

        if (isset($_SESSION['logged_in_pelanggan']) and $_SESSION['logged_in_pelanggan'] == TRUE) {
            $q = 0;
            $get = [];
            $data = [];
            $hargaarr = [];

            foreach ($this->cart->contents() as $item) {
                $produk = $this->db->table('barang')->where('id_barang', $item['id_barang'])->get()->getRowArray();

                $get[] = $produk;
                $get[$q]['qty'] = $item['qty'];
                $get[$q]['total_harga'] = $item['qty'] * $item['price'];
                $stok = $produk['stok_item'] - $item['qty'];
                $hargaarr[] = $item['qty'] * $item['price'];

                $this->db->table('barang')->where('id_barang', $item['id_barang'])->update([
                    'stok' => $stok
                ]);

                $q++;
            }

            $dataTransaksi = [
                'id_customer' => session()->get('id_customer'),
                'total_items' => count($get),
                'total_bayar' => array_sum($hargaarr),
                'batas_pembayaran' => date('m/d/Y', strtotime(date('m/d/Y' . ' + 1 Days')))
            ];

            $this->db->table('transaksi')->insert($dataTransaksi);
            $getLastID = $this->db->query('SELECT (LAST_INSERT_ID()) as id')->getRowArray();

            foreach ($get as $item) {
                $data[] = [
                    'id_transaksi' => $getLastID['id'],
                    'id_barang' => $item['id_barang'],
                    'id_customer' => session()->get('id_customer'),
                    'nama_barang' => $item['nama_barang'],
                    'kuantitas_barang' => $item['qty'],
                    'harga_barang' => $item['total_harga'],
                ];
            }

            $this->db->table('transaksi_detail')->insertBatch($data);

            $home->clear_cart();

            return redirect()->to(base_url('Panel/Transaksi'));
        } else {
            return redirect()->to(base_url('Login/User'))->with('type-status', 'error')
                ->with('message', 'Silahkan Login Terlebih Dahulu');
        }
    }
}