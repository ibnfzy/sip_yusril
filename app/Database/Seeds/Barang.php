<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    public function run()
    {
        $this->db->table('barang')->insertBatch([
            [
                'id_kategori' => '1',
                'nama_barang' => $this->faker()->languageCode(),
                'kategori' => 'Elektronik',
                'harga' => rand(10000, 99999999),
                'stok' => 99,
                'gambar' => 'gambar.jpg',
                'desc' => $this->faker()->text
            ],
            [
                'id_kategori' => '1',
                'nama_barang' => $this->faker()->languageCode(),
                'kategori' => 'Elektronik',
                'harga' => rand(10000, 99999999),
                'stok' => 99,
                'gambar' => 'gambar.jpg',
                'desc' => $this->faker()->text
            ],
            [
                'id_kategori' => '1',
                'nama_barang' => $this->faker()->languageCode(),
                'kategori' => 'Elektronik',
                'harga' => rand(10000, 99999999),
                'stok' => 99,
                'gambar' => 'gambar.jpg',
                'desc' => $this->faker()->text
            ],
            [
                'id_kategori' => '1',
                'nama_barang' => $this->faker()->languageCode(),
                'kategori' => 'Elektronik',
                'harga' => rand(10000, 99999999),
                'stok' => 99,
                'gambar' => 'gambar.jpg',
                'desc' => $this->faker()->text
            ],
            [
                'id_kategori' => '1',
                'nama_barang' => $this->faker()->languageCode(),
                'kategori' => 'Elektronik',
                'harga' => rand(10000, 99999999),
                'stok' => 99,
                'gambar' => 'gambar.jpg',
                'desc' => $this->faker()->text
            ],
        ]);
    }
}