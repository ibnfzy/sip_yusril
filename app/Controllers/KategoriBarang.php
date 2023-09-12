<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KategoriBarang extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('admin/kategori', [
            'data' => $this->db->table('kategori_barang')->get()->getResultArray()
        ]);
    }

    public function add()
    {
        return view('admin/kategori_add');
    }

    public function create()
    {
        $rules = [
            'nama_kategori' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OwnPanel/Kategori/add'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('kategori_barang')->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to(base_url('OwnPanel/Kategori'))->with('type-status', 'success')->with('message', 'Data berhasil ditambahkan');
    }

    public function delete($id)
    {
        $this->db->table('kategori_barang')->where('id_kategori', $id)->delete();

        return redirect()->to(base_url('OwnPanel/Kategori'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
    }
}