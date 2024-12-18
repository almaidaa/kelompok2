<?php

namespace App\Models;

use CodeIgniter\Model;


class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'nim', 'nama', 'prodi', 'semester'];
    protected $useTimestamps = false;
    protected $validationRules = [
        'nim'      => 'required|is_unique[mahasiswa.nim]',
        'nama'     => 'required|min_length[3]',
        'prodi'    => 'required|min_length[3]',
        'semester' => 'required|integer'
    ];
}
