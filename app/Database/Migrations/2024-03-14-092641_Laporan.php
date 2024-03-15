<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_laporan' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'auto_increment'    => true,
            ],
            'tgl_laporan' => [
                'type'              => 'DATE',
            ],
            'ket_laporan' => [
                'type'              => 'INT'
            ],
            'catatan' => [
                'type'              => 'TEXT'
            ],
            'id_laundry' => [
                'type'              => 'INT',
                'constraint'        => 5,
            ],
            'pemasukan' => [
                'type'              => 'INT'
            ],
            'id_pengeluaran' => [
                'type'              => 'INT',
                'constraint'        => 5,
            ],
            'pengeluaran' => [
                'type'              => 'INT'
            ]
        ]);

        $this->forge->addKey('id_laporan', true);
        $this->forge->addForeignKey('id_laundry', 'laundry', 'id_laundry');
        $this->forge->addForeignKey('id_pengeluaran', 'pengeluaran', 'id_pengeluaran');
        $this->forge->createTable('laporan');
    }

    public function down()
    {
        $this->forge->dropForeignKey('laporan', 'laporan_id_laundry_foreign');
        $this->forge->dropForeignKey('laporan', 'laporan_id_pengeluaran_foreign');
        $this->forge->dropTable('laporan');
    }
}
