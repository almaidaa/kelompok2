<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $session = session();
        $model = new UserModel();

        // Ambil input dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username
        $user = $model->where('username', $username)->first();
        //menggunakan hash password
        if ($user) {
            if ($user && password_verify($password, $user['password'])) {
                session()->set('user', $user);

                // Redirect berdasarkan role
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin');
                } elseif ($user['role'] === 'dosen') {
                    return redirect()->to('/dosen');
                } elseif ($user['role'] === 'mahasiswa') {
                    return redirect()->to('/mahasiswa');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
