<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDepartmentIdToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'department_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn(
            'users',
            'department_id'
        );
    }
}
