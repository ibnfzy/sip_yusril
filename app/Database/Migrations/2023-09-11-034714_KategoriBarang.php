<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]
        ]);

        $this->forge->addKey('id_kategori', true);

        $this->forge->createTable('kategori_barang');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_barang');
    }
}