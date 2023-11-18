<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Supplier extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_supplier' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama_supplier' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'kontak' => [
                'type' => 'VARCHAR',
                'constraint' => 13
            ]
        ]);

        $this->forge->addKey('id_supplier', true);

        $this->forge->createTable('supplier');
    }

    public function down()
    {
        $this->forge->dropTable('supplier');
    }
}