<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateUserTable extends Migration
{
    public function up()
    {
        
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fname' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null' => true
            ],
            'lname' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null' => true
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'unique'     => true,
                'null' => true
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null' => true
            ],
            'profile' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null' => true
            ],
            'status' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);

        $this->forge->addPrimaryKey('id'); 
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
