<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('admin/barang', [
            'data' => $this->db->table('barang')->orderBy('id_barang', 'DESC')->get()->getResultArray()
        ]);
    }

    public function add()
    {
        return view('admin/barang_add', [
            'kategori' => $this->db->table('kategori_barang')->get()->getResultArray()
        ]);
    }

    public function create()
    {
        $rules = [
            'id_kategori' => 'required',
            'nama_barang' => 'required|max_length[50]',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'is_image[gambar]',
            'desc' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OwnPanel/Barang/add'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $getKategori = $this->db->table('kategori_barang')->where('id_kategori', $this->request->getPost('id_kategori'))->get()->getRowArray();

        $extFile = $this->request->getFile('gambar')->guessExtension();
        $namafile = 'barang-' . rand(1, 100) . date('-dmY.') . $extFile;

        if (!$this->request->getFile('gambar')->hasMoved()) {
            $this->request->getFile('gambar')->move('uploads', $namafile);
        }

        $this->db->table('barang')->insert([
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori' => $getKategori['nama_kategori'],
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'gambar' => $namafile,
            'desc' => $this->request->getPost('desc')
        ]);

        $getLastID = $this->db->table('barang')->where('nama_barang', $this->request->getPost('nama_barang'))->get()->getRowArray();

        $this->db->table('stok_barang')->insert([
            'id_barang' => $getLastID['id_barang'],
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to(base_url('OwnPanel/Barang'))->with('type-status', 'success')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin/barang_edit', [
            'data' => $this->db->table('barang')->where('id_barang', $id)->get()->getRowArray(),
            'kategori' => $this->db->table('kategori_barang')->get()->getResultArray()
        ]);
    }

    public function update($id)
    {
        $rules = [
            'id_kategori' => 'required',
            'nama_barang' => 'required|max_length[50]',
            'harga' => 'required',
            'desc' => 'required'
        ];

        if ($this->request->getFile('gambar')->isValid()) {
            $rules[] = [
                'gambar' => 'is_image[gambar]',
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OwnPanel/Barang/' . $id))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
        }

        $getKategori = $this->db->table('kategori_barang')->where('id_kategori', $this->request->getPost('id_kategori'))->get()->getRowArray();

        $data = [
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori' => $getKategori['nama_kategori'],
            'harga' => $this->request->getPost('harga'),
            'desc' => $this->request->getPost('desc')
        ];

        if ($this->request->getFile('gambar')->isValid()) {
            $extFile = $this->request->getFile('gambar')->guessExtension();
            $namafile = 'barang-' . rand(1, 100) . date('-dmY.') . $extFile;

            if (!$this->request->getFile('gambar')->hasMoved()) {
                $this->request->getFile('gambar')->move('uploads', $namafile);
            }

            $data[] = [
                'gambar' => $namafile,
            ];
        }

        $this->db->table('barang')->where('id_barang', $id)->update($data);

        return redirect()->to(base_url('OwnPanel/Barang'))->with('type-status', 'success')->with('message', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->db->table('barang')->where('id_barang', $id)->delete();

        return redirect()->to(base_url('OwnPanel/Barang'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
    }
}