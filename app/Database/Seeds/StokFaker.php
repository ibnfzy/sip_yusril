<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StokFaker extends Seeder
{
    public function run()
    {
        $this->db->table('stok_barang')->insertBatch([
            [
                'id_barang' => rand(1, 5),
                'stok' => rand(1, 99)
            ],
            [
                'id_barang' => rand(1, 5),
                'stok' => rand(1, 99)
            ],
            [
                'id_barang' => rand(1, 5),
                'stok' => rand(1, 99)
            ],
            [
                'id_barang' => rand(1, 5),
                'stok' => rand(1, 99)
            ],
            [
                'id_barang' => rand(1, 5),
                'stok' => rand(1, 99)
            ],
            [
                'id_barang' => rand(1, 5),
                'stok' => rand(1, 99)
            ],
            [
                'id_barang' => rand(1, 5),
                'stok' => rand(1, 99)
            ],
            [
                'id_barang' => rand(1, 5),
                'stok' => rand(1, 99)
            ],
            [
                'id_barang' => rand(1, 5),
                'stok' => rand(1, 99)
            ],
        ]);
    }
}