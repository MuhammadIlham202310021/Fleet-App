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
            'Department Berhasul ditambahkan'
        );

        return redirect()
            ->to('/departments');
    }
}
