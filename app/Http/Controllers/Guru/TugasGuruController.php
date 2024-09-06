<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use App\Models\TugasGrade;
use Illuminate\Http\Request;

class TugasGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugases = Tugas::all();

        return view('guru.tugas.index', compact('tugases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $answerId)
    {
        $tugasAnswers = TugasAnswer::where('id', $answerId)->with(['users', 'tugases', 'tugas_grades'])
            ->first();

        return view('guru.tugas.create', compact('tugasAnswers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TugasGrade::create([
            'tugas_answer_id' => $request->tugas_answer_id,
            'nilai' => $request->nilai,
            'feedback' => $request->feedback
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugases = Tugas::where('id', $id)->with(['tugas_answers.tugas_jobs', 'tugas_answers.users', 'tugas_answers.tugas_grades'])->first();

        return view('guru.tugas.show', compact('tugases'));
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
        //
    }
}
