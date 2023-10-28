<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\RawSql;
use Dompdf\Dompdf;
use Dompdf\Options;

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

    public function update_password()
    {
        $rules = [
            'password_lama' => 'required',
            'password' => 'required',
            'confirm_password' => 'matches[password]',
        ];

        $check = $this->db->table('admin')->where('id_admin', session()->get('id_admin'))->get()->getRowArray();

        if (!password_verify($this->request->getPost('password_lama'), $check['password'])) {
            return redirect()->to(base_url('OwnPanel'))->with('type-status', 'error')->with('message', 'Password Lama Tidak Benar');
        }

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OwnPanel'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $data = [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $this->db->table('admin')->where('id_customer', session()->get('id_admin'))->update($data);

        return redirect()->to(base_url('OwnPanel'))->with('type-status', 'success')->with('message', 'Password berhasil diperbarui');
    }

    public function update_informasi()
    {
        $rules = [
            'tentang' => 'required',
            'alamat' => 'required',
            'kontak' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(previous_url())->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('toko_informasi')->where('id_toko', 1)->update([
            'tentang' => $this->request->getPost('tentang'),
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak')
        ]);

        return redirect()->to(previous_url())->with('type-status', 'success')->with('message', 'Data berhasil diubah');
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
        return view('admin/laporan_keuangan', [
            'data' => $this->db->table('transaksi')->select(new RawSql('DISTINCT YEAR(tgl_checkout) as tahun'))->get()->getResultArray()
        ]);
    }

    public function renderLapkeuangan()
    {
        $type = $this->request->getPost('views-control');

        switch ($type) {
            case 'bulan':
                $where = date('Y-m', strtotime($this->request->getPost('bulan')));
                $date = date('F Y', strtotime($this->request->getPost('bulan')));
                break;

            case 'tahun':
                $where = $this->request->getPost('tahun');
                $date = $this->request->getPost('tahun');
                break;

            default:
                $date = $this->request->getPost('bulan');
                $date = date('l Y', strtotime($this->request->getPost('bulan')));
                break;
        }

        return view('admin/render_laporan_keuangan', [
            'data' => $this->db->table('transaksi')->like('tgl_checkout', $where, 'right')->get()->getResultArray(),
            'type' => $type,
            'date' => $date
        ]);
    }

    public function analisa_stok()
    {
        return view('admin/analisa_stok', [
            'data' => $this->db->table('stok_barang')->select(new RawSql('DISTINCT YEAR(tgl_input) as tahun'))->get()->getResultArray()
        ]);
    }

    public function render_analisa_stok()
    {
        $type = $this->request->getPost('views-control');

        switch ($type) {
            case 'bulan':
                $where = date('Y-m', strtotime($this->request->getPost('bulan')));
                $date = date('F Y', strtotime($this->request->getPost('bulan')));
                break;

            case 'tahun':
                $where = $this->request->getPost('tahun');
                $date = $this->request->getPost('tahun');
                break;

            default:
                $date = $this->request->getPost('bulan');
                $date = date('l Y', strtotime($this->request->getPost('bulan')));
                break;
        }

        return view('admin/render_analisa_stok', [
            'data' => $this->db->table('stok_barang')->like('tgl_input', $where, 'right')->get()->getResultArray(),
            'type' => $type,
            'date' => $date
        ]);
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

        return redirect()->to(previous_url())->with('type-status', 'success')
            ->with('message', 'Data berhasil divalidasi');
    }

    public function kirim($id)
    {
        $this->db->table('transaksi')->where('id_transaksi', $id)->update([
            'status_transaksi' => 'Barang sedang dikirim'
        ]);

        return redirect()->to(previous_url())->with('type-status', 'success')
            ->with('message', 'Status Transaksi berhasil diubah');
    }
}