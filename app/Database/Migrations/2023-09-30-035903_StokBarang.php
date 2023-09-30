<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class StokBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_stok' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'id_barang' => [
                'type' => 'INT'
            ],
            'stok' => [
                'type' => 'INT'
            ],
            'tgl_input' => [
                'type' => 'DATE',
                'default' => new RawSql('(CURRENT_DATE)')
            ]
        ]);

        $this->forge->addKey('id_stok', true);

        $this->forge->createTable('stok_barang');
    }

    public function down()
    {
        $this->forge->dropTable('stok_barang');
    }
}