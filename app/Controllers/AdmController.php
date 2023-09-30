<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdmController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('admin/home', [
            'total_barang' => count($this->db->table('barang')->get()->getResultArray()),
            'total_transaksi' => count($this->db->table('transaksi')->where('status_transaksi', 'Selesai')->get()->getResultArray()),
            'total_pelanggan' => count($this->db->table('customer')->get()->getResultArray())
        ]);
    }

    public function add_stok()
    {
        $getLastStok = $this->db->table('barang')->where('id_barang', $this->request->getPost('id_barang'))->get()->getRowArray();

        $this->db->table('barang')->where('id_barang', $this->request->getPost('id_barang'))->update([
            'stok' => $getLastStok['stok'] + $this->request->getPost('stok')
        ]);

        $this->db->table('stok_barang')->insert([
            'id_barang' => $this->request->getPost('id_barang'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to(base_url('OwnPanel/Barang'));
    }

    public function pelanggan()
    {
        return view('admin/pelanggan', [
            'data' => $this->db->table('customer')->get()->getResultArray()
        ]);
    }

    public function laporan_keuangan()
    {
        return view('admin/laporan_keuangan');
    }

    public function analisa_stok()
    {
        return view('admin/analisa_stok');
    }

    public function transaksi()
    {
        return view('admin/transaksi', [
            'data' => $this->db->table('transaksi')->orderBy('id_transaksi', 'DESC')->get()->getResultArray()
        ]);
    }

    public function invoice($id, $idUser)
    {
        return view('admin/invoice', [
            'dataTransaksi' => $this->db->table('transaksi')->where('id_transaksi', $id)->get()->getRowArray(),
            'dataDetail' => $this->db->table('transaksi_detail')->where('id_transaksi', $id)->get()->getResultArray(),
            'dataToko' => $this->db->table('toko_informasi')->where('id_toko', '1')->get()->getRowArray(),
            'dataUser' => $this->db->table('customer')->where('id_customer', $idUser)->get()->getRowArray()
        ]);
    }

    public function validasi($id)
    {
        $this->db->table('transaksi')->where('id_transaksi', $id)->update([
            'status_transaksi' => 'Diproses'
        ]);

        return redirect()->to(base_url('OwnPanel/Transaksi/' . $id))->with('type-status', 'success')
            ->with('message', 'Data berhasil divalidasi');
    }

    public function kirim($id)
    {
        $this->db->table('transaksi')->where('id_transaksi', $id)->update([
            'status_transaksi' => 'Barang sedang dikirim'
        ]);

        return redirect()->to(base_url('OwnPanel/Transaksi/' . $id))->with('type-status', 'success')
            ->with('message', 'Status Transaksi berhasil diubah');
    }
}