<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    // public function mahasiswa()
    // {
    //     $model = new MahasiswaModel();
    //     $data['mahasiswa'] = $model->findAll();
    //     return view('mahasiswa/dashboard', $data);
    // }

    // public function create()
    // {
    //     return view('mahasiswa/mhs_create');
    // }

    // public function store()
    // {
    //     $model = new MahasiswaModel();
    //     $data = [
    //         'user_id' => $this->request->getPost('user_id'),
    //         'nim'     => $this->request->getPost('nim'),
    //         'nama'    => $this->request->getPost('nama'),
    //         'prodi'   => $this->request->getPost('prodi'),
    //         'semester' => $this->request->getPost('semester')
    //     ];

    //     if ($model->save($data)) {
    //         return redirect()->to('/mahasiswa/dashboard');
    //     } else {
    //         return redirect()->back()->with('errors', $model->errors());
    //     }
    // }

    public function edit($id)
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->find($id);
        return view('/mahasiswa/create', $data);
    }

    public function update($id)
    {
        $model = new MahasiswaModel();
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'nim'     => $this->request->getPost('nim'),
            'nama'    => $this->request->getPost('nama'),
            'prodi'   => $this->request->getPost('prodi'),
            'semester' => $this->request->getPost('semester')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/mahasiswa');
        } else {
            return redirect()->back()->with('errors', $model->errors());
        }
    }

    public function delete($id)
    {
        $model = new MahasiswaModel();
        if ($model->delete($id)) {
            return redirect()->to('/mahasiswa');
        }
    }
}
