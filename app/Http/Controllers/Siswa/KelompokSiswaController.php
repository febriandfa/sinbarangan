<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelompok;
use App\Models\KelompokMember;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelompokSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->with(['members.kelompoks'])->first();

        $kelompoks = Kelompok::where('kelas', Auth::user()->kelas)->with(['members'])->get();

        return view('siswa.kelompok.index', compact('kelompoks', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelompoks = Kelompok::where('id', $id)->with(['members'])->first();

        $tugasAnswers = TugasAnswer::with(['tugases', 'tugas_grades'])->get();

        return view('siswa.kelompok.show', compact('kelompoks', 'tugasAnswers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function join($kelompok_id)
    {
        KelompokMember::create([
            'kelompok_id' => $kelompok_id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('kelompok.show', $kelompok_id);
    }

    public function leader(Request $request, $id)
    {
        $members = KelompokMember::findOrFail($id);

        $membersUpdate = $request->only(['role']);
        $membersUpdate['role'] = "ketua";

        $members->update($membersUpdate);

        return redirect()->back();
    }
}
