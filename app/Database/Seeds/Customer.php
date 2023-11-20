<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Customer extends Seeder
{
    public function run()
    {
        $this->db->table('customer')->insert([
            'username' => 'admin',
            'fullname' => 'Admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'kota' => 'Makassar',
            'kelurahan' => 'Makassar',
            'kecamatan' => 'Makassar',
            'alamat' => 'Jl. Toddopuli Raya No. 12',
            'nomor_hp' => '628123321123'
        ]);
    }
}