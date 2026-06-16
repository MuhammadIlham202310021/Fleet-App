<?php 

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
       return view('auth/login');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel 
            ->where('username', $username)
            ->first();
        
        if (!$user) {

        return redirect()
            ->to('/login')
            ->with('error', 'Username tidak ditemukan');
        }

        if (
            !password_verify(
                $password,
                $user['password']
        ))
        {
        return redirect()
            ->to('login')
            ->with('error', 'Password salah');
        }

        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'isLoggedIn' => true
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}