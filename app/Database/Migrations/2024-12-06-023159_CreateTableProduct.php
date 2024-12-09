<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProduct extends Migration
{
    public function up()
    {
        // Table Product
        $this->forge->addField([
            'id' => [
                'type'          => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'name_product' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'category_product' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'buy_price' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'sell_price' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'stock' => [
                'type'          => 'INT',
                'unsigned'    => true,
            ],
            'image' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('product');
    }

    public function down()
    {
        // Delete table product
        $this->forge->dropTable('product');
    }
}