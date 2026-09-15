<?php 

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nis', 'name', 'department_id', 'birth_date'
    ];

    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $validationRules = [
        'nis'   => 'required|min_length[3]|is_unique[students.nis,id,{id}]',
        'name'  => 'required|min_length[3]',
    ];

    protected $validationMessages = [
        'nis'   => [
            'required'  => 'NIS wajib diisi',
            'is_unique' => 'NIS sudah terdaftar'
        ],
        'name'  => [
            'required'  => 'Nama wajib diisi'
        ]
    ];

    public function getStudentsWithDepartment()
    {
        return $this->select('students.*, departments.department_name')
            ->join('departments', 'departments.id = students.department_id', 'left');
    }
}