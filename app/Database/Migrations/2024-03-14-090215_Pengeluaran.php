<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengeluaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengeluaran' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'auto_increment'    => true,
            ],
            'tgl_pengeluaran' => [
                'type'              => 'DATE',
            ],
            'catatan' => [
                'type'              => 'TEXT'
            ],
            'pengeluaran' => [
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

        $this->forge->addKey('id_pengeluaran', true);
        $this->forge->createTable('pengeluaran');
    }

    public function down()
    {
        $this->forge->dropTable('pengeluaran');
    }
}
