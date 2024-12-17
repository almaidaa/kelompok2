<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    // Menampilkan daftar user
    public function users()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        return view('admin/users', $data);
    }

    // Menambah user
    public function create()
    {
        return view('admin/create_users');
    }

    // Simpan user baru
    public function store()
    {
        $userModel = new UserModel();

        // Validasi input
        if (!$this->validate([
            'username' => 'required|min_length[3]|max_length[50]',
            'password' => 'required|min_length[6]',
            'role'     => 'required',
        ])) {
            return redirect()->to('/admin/users/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Menyimpan data user
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
        ]);

        return redirect()->to('/admin/users')->with('message', 'User berhasil ditambahkan');
    }

    // Menghapus user
    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/admin/users')->with('message', 'User berhasil dihapus');
    }
}
