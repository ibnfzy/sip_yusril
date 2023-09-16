<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'id_customer' => [
                'type' => 'INT'
            ],
            'total_items' => [
                'type' => 'INT'
            ],
            'total_bayar' => [
                'type' => 'INT'
            ],
            'bukti_bayar' => [
                'type' => 'TEXT'
            ],
            'tgl_checkout' => [
                'type' => 'DATE',
                'default' => new RawSql('(CURRENT_DATE)')
            ],
            'batas_pembayaran' => [
                'type' => 'DATE'
            ],
            'status_transaksi' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addKey('id_transaksi', true);

        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}