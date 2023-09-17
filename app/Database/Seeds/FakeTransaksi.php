<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FakeTransaksi extends Seeder
{
    public function run()
    {
        $this->db->table('transaksi')->insert([
            'id_customer' => 1,
            'total_items' => 2,
            'total_bayar' => 100000,
            'batas_pembayaran' => date('Y-m-d', strtotime(date('Y-m-d') . ' + 1 Days')),
            'status_transaksi' => 'Selesai'
        ]);

        $this->db->table('transaksi_detail')->insertBatch(
            [
                [
                    'id_transaksi' => 1,
                    'id_barang' => 1,
                    'id_customer' => 1,
                    'nama_barang' => 'Speaker',
                    'kuantitas_barang' => 2,
                    'harga_barang' => 50000,
                ]
            ]
        );
    }
}