<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelompok;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use App\Models\TugasJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasJobSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $tugasId)
    {
        $tugases = Tugas::where('id', $tugasId)->first();
        $tugasAnswers = TugasAnswer::where('tugas_id', $tugasId)->where('user_id', Auth::user()->id)->with(['tugas_jobs'])->first();
        $users = User::where('id', Auth::user()->id)->with(['members.kelompoks'])->first();
        $kelompoks = Kelompok::where('id', $users->members->kelompok_id)->with(['members.users'])->first();

        return view('siswa.tugas.daftarTugas.create', compact('tugasAnswers', 'tugases', 'kelompoks', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tugasJobs = TugasJob::create([
            'tugas_answer_id' => $request->tugas_answer_id,
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'deadline' => $request->deadline
        ]);

        $answers = TugasAnswer::findOrFail($tugasJobs->tugas_answer_id);

        return redirect()->route('tugas.daftarTugas', $answers->tugas_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function updateStatus(Request $request, $jobId)
    {
        $tugasJobs = TugasJob::findOrFail($jobId);

        $tugasJobsUpdate = $request->only('status');

        $tugasJobs->update($tugasJobsUpdate);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
