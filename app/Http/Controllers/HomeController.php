<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Simulasi;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function guru()
    {
        $simulasis = Simulasi::latest()->take(4)->get();
        $moduls = Modul::latest()->take(4)->get();
        $materis = $moduls->merge($simulasis)->take(4);

        $siswas = User::role('siswa')->where('kelas', Auth::user()->kelas)->get();

        $tugases = Tugas::orderBy('deadline', 'asc')->take(3)->get();

        return view('guru.dashboard', compact('materis', 'siswas', 'tugases'));
    }

    public function siswa()
    {
        $simulasis = Simulasi::latest()->take(4)->get();
        $moduls = Modul::latest()->take(4)->get();
        $materis = $moduls->merge($simulasis)->take(4);

        $tugases = Tugas::orderBy('deadline', 'asc')->take(3)->get();

        // $answers = TugasAnswer::where('kelompok_id', Auth::user()->members?->kelompok_id)
        //                         ->where('user_id', Auth::user()->id)
        //                         ->with(['tugas_grades', 'tugases'])->latest()->take(2)->get();

        $answers = TugasAnswer::where('user_id', Auth::user()->id)->with(['tugas_grades', 'tugases'])->latest()->take(2)->get();

        return view('siswa.dashboard', compact('materis', 'tugases', 'answers'));
    }

    public function admin()
    {
        $siswas = User::role('siswa')->get();
        $gurus = User::role('guru')->get();

        return view('admin.dashboard', compact('siswas', 'gurus'));
    }
}
