<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Corousel extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin/corousel', [
            'data' => $this->db->table('corousel')->get()->getResultArray()
        ]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('admin/corousel_add');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'gambar' => 'is_image[gambar]|max_size[gambar,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('OwnPanel/Corousel/new'))->with('type-status', 'error')
                ->with('dataMessage', $this->validator->getErrors());
        }

        $data = [
            'gambar' => $this->request->getFile('gambar')->getName(),
        ];

        if (!$this->request->getFile('gambar')->hasMoved()) {
            $this->request->getFile('gambar')->move('uploads');
        }

        $this->db->table('corousel')->insert($data);

        return redirect()->to(base_url('OwnPanel/Corousel'))->with('type-status', 'info')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function delete($id = null)
    {
        $this->db->table('corousel')->where('id_corousel', $id)->delete();

        return redirect()->to(base_url('OwnPanel/Corousel'))->with('type-status', 'info')
            ->with('message', 'Data berhasil terhapus');
    }
}