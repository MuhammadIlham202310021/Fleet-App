<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\DepartmentModel;

class StudentController extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();
        $keyword = $this->request->getGet('keyword');

        $students = $keyword
            ? $studentModel->like('name', $keyword)->paginate(10)
            : $studentModel->getStudentsWithDepartment()->paginate(10);
        
        return view('students/index', [
            'title'     => 'Data Siswa',
            'students'  => $students,
            'pager'     => $studentModel->pager,
            'keyword'   => $keyword,
        ]);
    }

    public function create()
    {
        $departmentModel = new DepartmentModel();
        return view('students/create', [
            'departments' => $departmentModel->findAll(),
        ]);
    }

    public function store()
    {
        $studentModel = new StudentModel();

        if (!$studentModel->save([
            'nis'               => $this->request->getPost('nis'),
            'name'              => $this->request->getPost('name'),
            'department_id'     => $this->request->getPost('department_id'),
            'birth_date'        => $this->request->getPost('birth_date'),
        ])) {
            return redirect()->back()->withInput()->with('errors', $studentModel->errors());
        }

        session()->setFlashdata('success', 'Siswa berhasil ditambahkan');
        return redirect()->to('/students');
    }

    public function edit($id)
    {
        $studentModel = new StudentModel();
        $departmentModel = new DepartmentModel();

        return view('students/edit', [
            'student'       => $studentModel->find($id),
            'departments'   => $departmentModel->findAll(),
        ]);
    }

    public function update($id)
    {
        $studentModel = new StudentModel();

        // Override rule nis khusus untuk update, isi id secara eksplisit
        $studentModel->setValidationRule(
            'nis',
            "required|min_length[3]|is_unique[students.nis,id,{$id}]"
        );

        if (!$studentModel->update ($id, [
            'nis'               => $this->request->getPost('nis'),
            'name'              => $this->request->getPost('name'),
            'department_id'     => $this->request->getPost('department_id'),
            'birth_date'        => $this->request->getPost('birth_date'),
        ])) {
            return redirect()->back()->withInput()->with('errors', $studentModel->errors());
        }

        session()->setFlashdata('success', 'Data siswa diupdate');
        return redirect()->to('/students');
    }

    public function delete($id)
    {
        (new StudentModel())->delete($id);
        session()->setFlashdata('success', 'Siswa dihapus');
        return redirect()->to('/students');
    }
}