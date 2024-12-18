<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    // Menampilkan halaman kelola user
    public function index()
    {
        $model = new UserModel();
        $users = $model->findAll(); // Ambil semua data user
        return view('/admin/edit', ['users' => $users]);
    }

    // Menampilkan form edit user
    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->find($id); // Cari user berdasarkan id

        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User tidak ditemukan');
        }

        return view('/admin/edit', ['user' => $user]); // Menampilkan form edit dengan data user
    }

    // Menyimpan perubahan data user
    public function update($id)
    {
        $model = new UserModel();
    
        // Validasi input
        $validation = $this->validate([
            'username' => 'required|min_length[3]|max_length[20]',
            'password' => 'required|min_length[6]',
        ]);
    
        if (!$validation) {
            // Kirim kembali ke form edit dengan pesan error
            return redirect()->to('/admin/edit/' . $id)
                             ->withInput()
                             ->with('validation', $this->validator);
        }
    
        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        // Hash password jika diubah
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Update data di database
        $model->update($id, [
            'username' => $username,
            'password' => $hashedPassword,
        ]);
    
        // Redirect ke halaman kelola user dengan pesan sukses
        return redirect()->to('/admin/users')->with('success', 'User berhasil diupdate.');
    }
    
}
