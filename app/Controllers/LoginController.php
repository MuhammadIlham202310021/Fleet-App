<?php 

// Menentukan bahwa LoginController berada di folder: app/Controllers
// Namespace digunakan agar CodeIgniter mengetahui lokasi class ini.
// LoginController merupakan controller yang bertanggung jawab
// untuk seluruh proses autentikasi (Login & Logout)

namespace App\Controllers;

// Menggunakan UserModel
// File yang dipanggil: app/Models/UserModel.php
// Tujuan: Agar LoginController dapat mengambil data user dari database.
use App\Models\UserModel;

class LoginController extends BaseController
{

    // Method index() bertugas menampilkan halaman login.
    // Method ini dipanggil oleh: Routes.php
    public function index()
    {
       return view('auth/login');
    }

    public function process()
    {

        // Mengambil data yang dikirim dari form login.
        // Data berasal dari: app/Views/auth/login.php
        // Karena form menggunakan: method="POST" maka menggunakan: getPost()
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Membuat object UserModel.
        // File: app/Models/UserModel.php
        // Tujuan: Agar LoginController dapat mengambil data dari tabel users.
        $userModel = new UserModel();

        // Mencari data user berdasarkan username yang diinput.
        // SQL yang kira-kira dijalankan:
        // SELECT * FROM users WHERE username = '$username' LIMIT 1
        $user = $userModel 
            ->where('username', $username)
            ->first();
        
        // Mengecek apakah username
        // ditemukan di database.
        // Jika: $user = null berarti username tidak ada.
        if (!$user) {

        // Jika username tidak ditemukan: Kembali ke halaman login.
        // Mengirim Flash Message: Username tidak ditemukan
        // Pesan ini nanti ditampilkan pada: app/Views/auth/login.php
        return redirect()
            ->to('/login')
            ->with('error', 'Username tidak ditemukan');
        }

        // Mengecek apakah password yang diinput user sama dengan password yang tersimpan di database.
        if (
            !password_verify(
                $password,
                $user['password']
        ))

        // Jika password salah: Kembali ke halaman login.
        // Mengirim Flash Message: Password salah
        // View: auth/login.php akan menampilkan pesan tersebut.
        {
        return redirect()
            ->to('login')
            ->with('error', 'Password salah');
        }

        // Menyimpan informasi user ke dalam Session.
        // Session ini digunakan sebagai penanda bahwa user sudah login.
        // File yang menggunakan session ini: app/Filters/AuthFilter.php
        // AuthFilter akan mengecek:session('isLoggedIn')
        // Jika TRUE:user boleh masuk Dashboard.
        // Jika FALSE: user diarahkan ke Login.
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'isLoggedIn' => true
        ]);

        // Setelah login berhasil user diarahkan ke: /dashboard
        return redirect()->to('/dashboard');
    }

    // Method logout() digunakan
    // Route: /logout berasal dari: Routes.php
    public function logout()
    {
        // Menghapus seluruh Session.
        session()->destroy();

        // Setelah logout selesai,user dikembalikan ke halaman login.
        return redirect()->to('/login');
    }
}