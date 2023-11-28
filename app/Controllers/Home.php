<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;
    protected $cart;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->cart = \Config\Services::cart();
    }

    public function index(): string
    {
        return view('web/home', [
            'corousel' => $this->db->table('corousel')->get()->getResultArray(),
            'rekom' => $this->db->table('barang')->orderBy('RAND()')->limit(4)->get()->getResultArray()
        ]);
    }

    public function cari()
    {
        $data = $this->db->table('barang')->like('nama_barang', $this->request->getPost('nama_barang'))->get()->getResultArray();

        if ($data == null) {
            return redirect()->to(previous_url())->with('type-status', 'error')
                ->with('message', 'Data Tidak Ditemukan');
        }

        return view('web/katalog', [
            'data' => $data
        ]);
    }

    public function katalog()
    {
        return view('web/katalog', [
            'data' => $this->db->table('barang')->orderBy('id_barang', 'DESC')->get()->getResultArray()
        ]);
    }

    public function katalog_kategori($id)
    {
        return view('web/katalog', [
            'data' => $this->db->table('barang')->where('id_kategori', $id)->orderBy('id_barang', 'DESC')->get()->getResultArray()
        ]);
    }

    public function detail($id)
    {
        return view('web/detail', [
            'data' => $this->db->table('barang')->where('id_barang', $id)->get()->getRowArray()
        ]);
    }

    public function review_star($id)
    {
        $get = $this->db->table('review')->where('id_barang', $id)->get()->getResultArray();

        $rt = [];
        $i = 1;

        foreach ($get as $barang) {
            $rt[] = $barang['bintang'];
        }

        $nilai = array_sum($rt);

        $pbagi = count($rt);

        try {
            $rating = $nilai / $pbagi;
        } catch (\Throwable $th) {
            $rating = 0;
        }

        $nbulat = round($rating);
        $nbulat = ($nbulat > 5) ? 5 : $nbulat;
        $star = '';

        if ($nbulat == 1) {
            $star = '⭐';

        } else if ($nbulat == 2) {
            $star = '⭐⭐';

        } else if ($nbulat == 3) {
            $star = '⭐⭐⭐';

        } else if ($nbulat == 4) {
            $star = '⭐⭐⭐⭐';

        } else if ($nbulat == 5) {
            $star = '⭐⭐⭐⭐⭐';

        }

        return $star;
    }

    public function total_review($id)
    {
        $get = $this->db->table('review')->where('id_barang', $id)->get()->getResultArray();

        return count($get);
    }

    public function review($id)
    {
        return $this->db->table('review')->where('id_barang', $id)->get()->getResultArray();
    }

    public function cart()
    {
        return view('web/cart');
    }

    public function add_barang($id)
    {
        $get = $this->db->table('barang')->where('id_barang', $id)->get()->getRowArray();

        if ($get['stok'] < 1) {
            return redirect()->to(previous_url())->with('type-status', 'error')
                ->with('message', 'Stok Kosong');
        }

        $this->cart->insert([
            'id' => $get['id_barang'],
            'qty' => 1,
            'price' => $get['harga'],
            'name' => $get['nama_barang'],
            'gambar' => $get['gambar'],
            'stok' => $get['stok']
        ]);

        return redirect()->to(base_url('Cart'));
    }

    public function remove_barang($rowId)
    {
        $this->cart->remove($rowId);

        return redirect()->to(base_url('Cart'));
    }

    public function clear_cart()
    {
        $destroy = new \CodeIgniterCart\Config\Services;

        $destroy->cart()->destroy();
        $_SESSION['diskon'] = 0;
        $_SESSION['id_diskon'] = null;

        return redirect()->to(base_url('Cart'));
    }

    public function update_cart()
    {
        $rowid = $this->request->getPost('rowid');
        $qty = $this->request->getPost('qtybutton');
        $stok = $this->request->getPost('stok');
        $status = true;

        for ($i = 1; $i <= count($this->cart->contents()); $i++) {
            if ($qty[$i] > $stok[$i]) {
                $status = false;
                break;
            }

            $this->cart->update([
                'rowid' => $rowid[$i],
                'qty' => $qty[$i]
            ]);
        }

        if ($status == false) {
            return redirect()->to(base_url('Cart'))->with('type-status', 'error')
                ->with('message', 'Kuantitas barang melebihi stok');
        }

        return redirect()->to(base_url('Cart'))->with('type-status', 'success')
            ->with('message', 'Berhasil diperbaruhi');
    }
}