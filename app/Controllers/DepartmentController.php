<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DepartmentModel;

class DepartmentController extends BaseController
{
    public function index()
    {
        $departmentModel = 
            new DepartmentModel();

        $data = [
            'departments' =>
                $departmentModel->paginate(5),

            'pager' =>
                $departmentModel->pager
        ];

        return view(
            'departments/index',
            $data
        );
    }

    public function create()
    {
        return view(
            'department/create'
        );
    }

    public function store()
    {
        $rules = [
            'department_name' =>
                'required|min_length[3]'
        ];

        if (!$this->validate($rules))
        {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }

        $departmentModel =
            new DepartmentModel();

        $departmentModel->insert([

            'department_name' =>
                $this->request
                    ->getPost(
                        'department_name'
                    )
        ]);

        session()->setFlashdata(
            'success',
            'Department Berhasil ditambahkan'
        );

        return redirect()
            ->to('/departments');
    }

    public function edit($id)
    {
        $departmentModel = 
            new DepartmentModel();
        $data = [
            'department' =>
                $departmentModel->find($id)
        ];

        return view(
            'departments/edit',
            $data
        );
    }

    public function update($id)
    {
        $departmentModel =
            new DepartmentModel();
        
        $departmentModel->update($id, [
            'department_name' =>
                $this->request
                    ->getPost('department_name')
        ]);

        session()->setFlashdata(
            'success',
            'Department berhasil diupdate'
        );

        return redirect()
        ->to('/departments');
    }

    public function delete($id)
    {
        $departmentModel = new DepartmentModel();

        $departmentModel->delete($id);

        session()->setFlashdata(
            'success',
            'Department berhasil dihapus'
        );

        return redirect()->to('/departments');
    }
}
