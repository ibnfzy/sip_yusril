<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Supplier extends Seeder
{
    public function run()
    {
        $this->db->table('supplier')->insertBatch([
            [
                'nama_supplier' => 'Supplier 1',
                'kontak' => '6285825118330',
            ],
            [
                'nama_supplier' => 'Supplier 2',
                'kontak' => '6285825118330'
            ]
        ]);
    }
}