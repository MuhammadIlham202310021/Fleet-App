<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use Config\Session;
use App\Models\DepartmentModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $users = $userModel
                ->like('username', $keyword)
                ->paginate(5);
        } else {
            $users = $userModel
            ->getUserWithDepeartment()    
            ->paginate(5);
        }

        $data = [
            'title' => 'User Management',
            'users' => $users,
            'pager' => $userModel->pager,
            'keywoard' => $keyword
        ];

        return view('users/index', $data);
    }

    public function create()
    {
        $departmentModel =
            new DepartmentModel();
        
        $data = [
            'departments' =>
                $departmentModel->findAll()
        ];

        return view(
            'users/create',
            $data
        );
    }
    
    public function store()
    {
        $validation = $this->validate([
            'username' => [
                'rules' => 'required|min_length[3]|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username wajib diisi',
                    'min_length' => 'Username minimal 3 karakter',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],

            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 6 karakter'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        //dd($this->request->getPost());

        $userModel->insert([
            'username' => 
                $this->request
                    ->getPost('username'),

            'password' => password_hash(
                $this->request
                    ->getPost('password'),
                PASSWORD_DEFAULT
            ),

            'department_id' =>
                $this->request
                    ->getPost('department_id')
        ]);

        Session()->setFlashdata(
            'success',
            'User berhasil ditambahkan'
        );

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $departmentModel = new DepartmentModel();

        $data = [
            'user' => $userModel->find($id),
            'deparments' =>
                $departmentModel->findAll()
        ];

        return view('users/edit', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'department_id' => $this->request->getPost('department_id')
        ];

        if ($this->request->getPost('password')) {

            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );
        }

        $userModel->update($id, $data);

        session()->setFlashdata(
            'success',
            'User berhasil diupdate'
        );

        return redirect()->to('/users');
    }

    public function delete($id)
    {
        if ($id == session()->get('user_id')) {

            session()->setFlashdata(
                'error',
                'Tidak bisa menghapus user yang sedang login'
            );

            return redirect()->to('/users');
        }

        $userModel = new UserModel();

        $userModel->delete($id);

        session()->setFlashdata(
            'success',
            'User berhasil dihapus'
        );

        return redirect()->to('/users');
    }
}
