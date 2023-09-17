<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederMyDB extends Seeder
{
    public function run()
    {
        $this->call('Admin');
        $this->call('KategoriBarang');
        $this->call('Barang');
        $this->call('Corousel');
        $this->call('Customer');
        $this->call('InformasiToko');
    }
}