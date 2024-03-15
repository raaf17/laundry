<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laundry extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_laundry' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'auto_increment'    => true,
            ],
            'id_pelanggan' => [
                'type'              => 'INT',
                'constraint'        => 5,
            ],
            'id_user' => [
                'type'              => 'INT',
                'constraint'        => 5,
            ],
            'id_jenis' => [
                'type'              => 'INT',
                'constraint'        => 5,
            ],
            'tgl_terima' => [
                'type'              => 'DATE',
            ],
            'tgl_selesai' => [
                'type'              => 'DATE',
            ],
            'jumlah_kilo' => [
                'type'              => 'INT',
            ],
            'catatan' => [
                'type'              => 'TEXT'
            ],
            'total_bayar' => [
                'type'              => 'INT',
            ],
            'status_pembayaran' => [
                'type'              => 'INT',
            ],
            'status_pengembalian' => [
                'type'              => 'INT',
            ]
        ]);

        $this->forge->addKey('id_laundry', true);
        $this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan');
        $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->addForeignKey('id_jenis', 'jenis', 'id_jenis');
        $this->forge->createTable('laundry');
    }

    public function down()
    {
        $this->forge->dropForeignKey('laundry', 'laundry_id_pelanggan_foreign');
        $this->forge->dropForeignKey('laundry', 'laundry_id_user_foreign');
        $this->forge->dropForeignKey('laundry', 'laundry_id_jenis_foreign');
        $this->forge->dropTable('laundry');
    }
}
