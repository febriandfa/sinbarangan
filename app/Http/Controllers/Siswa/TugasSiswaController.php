<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TugasSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugases = Tugas::with(['tugas_answers.tugas_grades'])->get();

        $users = User::where('id', Auth::user()->id)->with(['members'])->first();

        return view('siswa.tugas.index', compact('tugases', 'users'));
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
        $request->validate([
            // 'file_presentasi' => 'nullable|mimes:pdf|max:8048',
            'file_laporan' => 'nullable|mimes:pdf|max:8048',
        ]);



        // $filePresentasiName = null;
        $fileLaporanName = null;

        // if ($request->hasFile('file_presentasi')) {
        //     $filePresentasi = $request->file('file_presentasi');
        //     $extension = $filePresentasi->getClientOriginalName();
        //     $filePresentasiName = date('YmdHis') . "." . $extension;
        //     $filePresentasi->move(storage_path('app/public/tugasAnswer/presentasi'), $filePresentasiName);
        // }

        if ($request->hasFile('file_laporan')) {
            $fileLaporan = $request->file('file_laporan');
            $extension = $fileLaporan->getClientOriginalName();
            $fileLaporanName = date('YmdHis') . "." . $extension;
            $fileLaporan->move(storage_path('app/public/tugasAnswer/laporan'), $fileLaporanName);
        }

        $rumusanMasalah = $request->session()->get('rumusan_masalah') ?? $request->rumusan_masalah;

        TugasAnswer::create([
            'tugas_id' => $request->tugas_id,
            'user_id' => Auth::user()->id,
            'kelompok_id' => Auth::user()->members->kelompok_id,
            'rumusan_masalah' => $rumusanMasalah,
            'file_presentasi' =>  $request->file_presentasi,
            'file_laporan' => $fileLaporanName
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugases = Tugas::where('id', $id)->with(['tugas_answers.tugas_grades'])->first();

        return view('siswa.tugas.show', compact('tugases'));
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
        $request->validate([
            // 'file_presentasi' => 'nullable|mimes:pdf|max:8048',
            'file_laporan' => 'nullable|mimes:pdf|max:8048',
        ]);

        $tugasAnswers = TugasAnswer::findOrFail($id);

        // $filePresentasiName = $tugasAnswers->file_presentasi;
        $fileLaporanName = $tugasAnswers->file_laporan;

        // if ($request->hasFile('file_presentasi')) {
        //     Storage::delete("public/tugasAnswer/presentasi/" . $filePresentasiName);

        //     $filePresentasi = $request->file('file_presentasi');
        //     $extension = $filePresentasi->getClientOriginalName();
        //     $filePresentasiName = date('YmdHis') . "." . $extension;
        //     $filePresentasi->move(storage_path('app/public/tugasAnswer/presentasi'), $filePresentasiName);
        // }

        if ($request->hasFile('file_laporan')) {
            Storage::delete("public/tugasAnswer/laporan/" . $fileLaporanName);

            $fileLaporan = $request->file('file_laporan');
            $extension = $fileLaporan->getClientOriginalName();
            $fileLaporanName = date('YmdHis') . "." . $extension;
            $fileLaporan->move(storage_path('app/public/tugasAnswer/laporan'), $fileLaporanName);
        }

        $tugasAnswersUpdate = $request->all();
        // $tugasAnswersUpdate['file_presentasi'] = $filePresentasiName;
        $tugasAnswersUpdate['file_laporan'] = $fileLaporanName;

        $tugasAnswers->update($tugasAnswersUpdate);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function rumusanMasalah(string $id)
    {
        $tugases = Tugas::with(['tugas_answers.tugas_jobs'])->findOrFail($id);

        return view('siswa.tugas.detailTugas.rumusanMasalah', compact('tugases'));
    }

    public function daftarTugas(string $id)
    {
        $tugases = Tugas::with(['tugas_answers.tugas_jobs.users'])->findOrFail($id);

        $users = User::where('id', Auth::user()->id)->with(['members'])->first();

        return view('siswa.tugas.detailTugas.daftarTugas', compact('tugases', 'users'));
    }

    public function laporan(string $id)
    {
        $tugases = Tugas::with(['tugas_answers.tugas_jobs.users'])->findOrFail($id);

        return view('siswa.tugas.detailTugas.laporan', compact('tugases'));
    }

    public function feedback(string $id)
    {
        $tugases = Tugas::with(['tugas_answers.tugas_grades'])->findOrFail($id);

        return view('siswa.tugas.detailTugas.feedback', compact('tugases'));
    }
}
