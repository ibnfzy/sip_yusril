<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'id_kategori' => [
                'type' => 'INT'
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'harga' => [
                'type' => 'INT'
            ],
            'stok' => [
                'type' => 'INT',
                'default' => 0
            ],
            'gambar' => [
                'type' => 'TEXT'
            ],
            'desc' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addKey('id_barang', true);

        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}