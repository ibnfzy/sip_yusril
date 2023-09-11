<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    public function run()
    {
        $this->db->table('barang')->insert([
            'id_kategori' => '1',
            'nama_barang' => 'Speaker',
            'kategori' => 'Elektronik',
            'harga' => 200000,
            'stok' => 99,
            'gambar' => 'gambar.jpg',
            'desc' => $this->faker()->text
        ]);
    }
}