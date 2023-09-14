<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Corousel extends Seeder
{
    public function run()
    {
        $this->db->table('corousel')->insert([
            'gambar' => 'banner-01.jpg'
        ]);
    }
}