<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanduanController extends Controller
{
    public function index()
    {
        return view('panduan.index');
    }

    public function guru()
    {
        return view('guru.panduan.index');
    }

    public function siswa()
    {
        return view('siswa.panduan.index');
    }

    public function admin()
    {
        return view('admin.panduan.index');
    }
}
