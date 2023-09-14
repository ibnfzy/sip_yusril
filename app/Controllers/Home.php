<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index(): string
    {
        return view('web/home', [
            'corousel' => $this->db->table('corousel')->get()->getResultArray(),
            'rekom' => $this->db->table('barang')->orderBy('RAND()')->limit(4)->get()->getResultArray()
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
}