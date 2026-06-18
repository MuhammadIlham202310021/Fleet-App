<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DepartmentModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $departmentModel = new DepartmentModel();

        $data = [

        'title' => 'Dashboard',

        'totalUser' => 
            $userModel->countAll(),

        'totalDepartment' => 
            $departmentModel->countAll(),

        'itUser' => $userModel
            ->where('department_id', 1)
            ->countAllresults()
        ];

        // Untuk test
        // dd($userModel->findAll());

        return view('dashboard/index', $data);

    }
}
