<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Supplier extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('admin/supplier', [
            'data' => $this->db->table('supplier')->get()->getResultArray()
        ]);
    }

    public function create()
    {
        $rules = [
            'nama_supplier' => 'required',
            'kontak' => 'required|max_length[13]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OwnPanel/Supplier'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('supplier')->insert([
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'kontak' => $this->request->getPost('kontak')
        ]);

        return redirect()->to(base_url('OwnPanel/Supplier'))->with('type-status', 'success')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit()
    {
        $rules = [
            'nama_supplier' => 'required',
            'kontak' => 'required|max_length[13]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OwnPanel/Supplier'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $this->db->table('supplier')->where('id_supplier', $this->request->getPost('id_supplier'))->update([
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'kontak' => $this->request->getPost('kontak')
        ]);

        return redirect()->to(base_url('OwnPanel/Supplier'))->with('type-status', 'success')->with('message', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->db->table('supplier')->where('id_supplier', $id)->delete();

        return redirect()->to(base_url('OwnPanel/Supplier'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
    }
}