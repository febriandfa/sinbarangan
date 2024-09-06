<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionSiswaController extends Controller
{
    public function store(Request $request)
    {
        $request->session()->put('rumusan_masalah', $request->rumusan_masalah);

        return response()->json(['message' => 'Data berhasil disimpan ke dalam session.']);
    }
}
