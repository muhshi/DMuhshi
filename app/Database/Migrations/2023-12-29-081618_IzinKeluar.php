<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IzinKeluar extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => '5',
                'unsigned'       => true,
            ],
            'keperluan' => [
                'type'       => 'text',
            ],
            'jam_pergi' => [
                'type' => 'DATETIME',

            ],
            'jam_balik' => [
                'type' => 'DATETIME',

            ],
            'atas_izin' => [
                'type'       => 'int',
                'constraint' => '5',
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('izin');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('izin');
    }
}
