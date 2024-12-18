<?php

namespace App\Controllers;

use App\Models\NilaiModel;
use App\Models\MahasiswaModel;

class DosenController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Dosen'
        ];
        return view('dosen/dashboard', $data);
    }

    public function lihatNilai()
    {
        $nilaiModel = new NilaiModel();
        $data = [
            'nilai' => $nilaiModel->getAllNilai() // Method untuk mengambil semua nilai
        ];

        return view('dosen/lihat_nilai', $data);
    }

    public function inputNilai()
    {
        $mahasiswaModel = new MahasiswaModel();

        $data = [
            'mahasiswa' => $mahasiswaModel->findAll()
        ];

        return view('dosen/input_nilai', $data);
    }

    public function simpanNilai()
    {
        $nilaiModel = new NilaiModel();

        // Validasi Input
        if (!$this->validate([
            'mahasiswa_id' => 'required',
            'matakuliah' => 'required',
            'nilai' => 'required|numeric|min_length[1]|max_length[3]'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Simpan data
        $nilaiModel->insert([
            'mahasiswa_id' => $this->request->getPost('mahasiswa_id'),
            'matakuliah' => $this->request->getPost('matakuliah'),
            'nilai' => $this->request->getPost('nilai')
        ]);

        return redirect()->to('/dosen/lihat-nilai')->with('success', 'Nilai berhasil disimpan.');
    }
}?>