<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_customer' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
            ],
            'fullname' => [
                'type' => 'VARCHAR',
                'constraint' => 120
            ],
            'password' => [
                'type' => 'TEXT',
            ],
            'kota' => [
                'type' => 'TEXT'
            ],
            'alamat' => [
                'type' => 'TEXT'
            ],
            'kecamatan' => [
                'type' => 'TEXT'
            ],
            'kelurahan' => [
                'type' => 'TEXT'
            ],
            'nomor_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 13
            ]
        ]);

        $this->forge->addKey('id_customer', true);

        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}