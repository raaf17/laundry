<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'auto_increment'    => true,
            ],
            'username' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100'
            ],
            'password' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100'
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
            'level' => [
                'type'              => 'VARCHAR',
                'constraint'        => '10'
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

        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
