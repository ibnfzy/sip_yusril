<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InformasiToko extends Seeder
{
    public function run()
    {
        $this->db->table('toko_informasi')->insert([
            'tentang' => $this->faker()->text(),
            'alamat' => $this->faker()->streetAddress(),
            'kontak' => $this->faker()->phoneNumber()
        ]);
    }
}