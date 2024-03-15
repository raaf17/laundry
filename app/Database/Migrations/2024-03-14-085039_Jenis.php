<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jenis extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'auto_increment'    => true,
            ],
            'jenis_laundry' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100'
            ],
            'lama_proses' => [
                'type'              => 'INT'
            ],
            'tarif' => [
                'type'              => 'INT'
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

        $this->forge->addKey('id_jenis', true);
        $this->forge->createTable('jenis');
    }

    public function down()
    {
        $this->forge->dropTable('jenis');
    }
}
