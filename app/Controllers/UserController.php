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

    public function upload($id)
    {
        helper('form');
        $rules = [
            'gambar' => 'is_image[gambar]|max_size[gambar,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('Panel/Transaksi/' . $id))->with('type-status', 'error')
                ->with('dataMessage', $this->validator->getErrors());
        }

        $data = [
            'bukti_bayar' => $this->request->getFile('gambar')->getName(),
            'status_bayar' => 'Menunggu Validasi Bukti Bayar',
        ];

        if (!$this->request->getFile('gambar')->hasMoved()) {
            $this->request->getFile('gambar')->move('uploads');
        }

        $this->db->table('transaksi')->where('id_transaksi', $id)->update($data);

        return redirect()->to(base_url('Panel/Transaksi/' . $id))->with('type-status', 'info')
            ->with('message', 'Bukti Bayar berhasil diupload');
    }

    public function checkout()
    {
        helper('text');

        $home = new Home;

        if (isset($_SESSION['logged_in_cust']) and $_SESSION['logged_in_cust'] == TRUE) {
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
                'batas_pembayaran' => date('Y-m-d', strtotime(date('Y-m-d') . ' + 1 Days'))
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

    public function selesai($id)
    {
        $this->db->table('transaksi')->where('id_transaksi', $id)->update([
            'status_transaksi' => 'Selesai'
        ]);

        return redirect()->to(base_url('Panel/Transaksi/' . $id))->with('type-status', 'success')
            ->with('message', 'Transaksi Selesai');
    }

    public function review_add($id)
    {
        $rules = [
            'bintang' => 'required',
            'deskripsi' => 'required',
            'id_barang' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('Panel/Transaksi/' . $id))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $get = $this->db->table('transaksi')->where('id_transaksi', $id)->get()->getRowArray();

        $data = [
            'id_barang' => $this->request->getPost('id_barang'),
            'id_customer' => $get['id_customer'],
            'deskripsi' => $this->request->getPost('deskripsi'),
            'bintang' => $this->request->getPost('bintang'),
            'insert_datetime' => date('d/m/Y - H:i')
        ];

        $this->db->table('review')->insert($data);

        return redirect()->to(base_url('Panel/Transaksi/' . $id))->with('type-status', 'success')->with('message', 'Review berhasil ditambahkan');
    }

    public function review()
    {
        return view('user/review', [
            'data' => $this->db->table('review')->where('id_customer', session()->get('id_customer'))->orderBy('id_review', 'DESC')->get()->getResultArray()
        ]);
    }

    public function review_delete($id)
    {
        $this->db->table('review')->where('id_review', $id)->delete();

        return redirect()->to(base_url('Panel/Review'))->with('type-status', 'success')->with('message', 'Review berhasil dihapus');
    }
}