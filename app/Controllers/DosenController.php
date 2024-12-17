<?php

namespace App\Controllers;

class DosenController extends BaseController
{
    public function index()
    {
        return view('dosen/dashboard.php');
    }
}
