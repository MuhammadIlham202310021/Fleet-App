<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStudents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'nis' => [
                'type'          => 'VARCHAR',
                'constraint'    => 20,
            ],
            'name' => [
                'type'          => 'VARCHAR',
                'constraint'    => 100,
            ],
            'department_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
                'null'          => true,
            ],
            'birth_date'    => [
                'type'          => 'DATE',
                'null'          => true,
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('students');
    }

    public function down()
    {
        $this->forge->dropTable('students');
    }
}
