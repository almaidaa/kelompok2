<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;

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
            'nim' => 'required|min_length[3]|max_length[12]',
            'role'     => 'required',
        ])) {
            return redirect()->to('/admin/create_users')->withInput()->with('message', 'Pembuatan Tidak Berhasil', $this->validator->getErrors());
        }

        // Menyimpan data user
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nim' => $this->request->getPost('nim'),
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

    // kelola mahasiswa
    public function mahasiswa()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll();
        return view('/admin/dashboardmhs', $data);
    }

    public function createmhs()
    {
        return view('/admin/mhs_create');
    }

    public function storemhs()
    {
        $model = new MahasiswaModel();

        // Validasi input
        if (!$this->validate([
            'nim' => [
                'rules' => 'required|numeric|min_length[3]|max_length[12]|is_not_unique[users.nim]|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required' => 'NIM harus diisi.',
                    'numeric' => 'NIM harus berupa angka.',
                    'min_length' => 'NIM minimal 3 karakter.',
                    'max_length' => 'NIM maksimal 12 karakter.',
                    'is_not_unique' => 'NIM tidak ditemukan di tabel users.',
                    'is_unique' => 'NIM sudah terdaftar di tabel mahasiswa.',
                ]
            ],
            'nama' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'string' => 'Nama harus berupa teks.',
                    'max_length' => 'Nama maksimal 100 karakter.',
                ]
            ],
            'prodi' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Prodi harus diisi.',
                    'string' => 'Prodi harus berupa teks.',
                    'max_length' => 'Prodi maksimal 100 karakter.',
                ]
            ],
            'semester' => [
                'rules' => 'required|integer|min_length[1]|max_length[2]',
                'errors' => [
                    'required' => 'Semester harus diisi.',
                    'integer' => 'Semester harus berupa angka.',
                    'min_length' => 'Semester minimal 1 karakter.',
                    'max_length' => 'Semester maksimal 2 karakter.',
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data yang akan disimpan
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'semester' => $this->request->getPost('semester'),
        ];

        // Simpan ke database
        if ($model->save($data)) {
            return redirect()->to('/admin/dashboardmhs')->with('success', 'Data mahasiswa berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }
}
