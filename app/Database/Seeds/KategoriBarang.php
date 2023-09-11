<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriBarang extends Seeder
{
    public function run()
    {
        $this->db->table('kategori_barang')->insert([
            'nama_kategori' => 'Elektronik'
        ]);
    }
}