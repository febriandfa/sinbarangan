<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use Illuminate\Http\Request;

class TugasAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugases = Tugas::all();

        return view('admin.tugas.index', compact('tugases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tugas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline
        ]);

        return redirect()->route('tugas-admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugases = Tugas::where('id', $id)->with(['tugas_answers.tugas_jobs', 'tugas_answers.users', 'tugas_answers.tugas_grades'])->first();

        return view('admin.tugas.show', compact('tugases'));
    }

    public function hasil(string $answerId)
    {
        $tugasAnswers = TugasAnswer::where('id', $answerId)->with(['users', 'tugases', 'tugas_grades'])
                                        ->first();

        return view('admin.tugas.hasil', compact('tugasAnswers'));
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
        $tugases = Tugas::findOrFail($id);

        $tugases->delete();

        return redirect()->route('tugas-admin.index');
    }
}
