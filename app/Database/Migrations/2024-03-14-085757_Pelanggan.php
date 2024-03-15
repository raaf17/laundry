<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'auto_increment'    => true,
            ],
            'nama' => [
                'type'              => 'VARCHAR',
                'constraint'        => '150'
            ],
            'jenis_kelamin' => [
                'type'              => 'VARCHAR',
                'constraint'        => '15'
            ],
            'alamat' => [
                'type'              => 'TEXT'
            ],
            'no_telepon' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20'
            ],
            'foto' => [
                'type'              => 'VARCHAR',
                'constraint'        => '150'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_pelanggan', true);
        $this->forge->createTable('pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
