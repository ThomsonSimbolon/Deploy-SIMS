<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
    public function up()
    {
        // Membuat tabel users
        $this->forge->addField([
            'id' => [
                'type' => 'SERIAL',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => 'NOW()',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => 'NOW()',
                'onUpdate' => 'CURRENT_TIMESTAMP',
            ],
        ]);

        // Menambahkan primary key
        $this->forge->addPrimaryKey('id');

        // Membuat tabel di database
        $this->forge->createTable('users');
    }

    public function down()
    {
        // Menghapus tabel users
        $this->forge->dropTable('users');
    }
}
