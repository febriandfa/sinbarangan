<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class KelompokAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelompoks = Kelompok::all();

        return view('admin.kelompok.index', compact('kelompoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelompok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kelompok::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'kuota' => $request->kuota
        ]);

        return redirect()->route('kelompok-admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelompoks = Kelompok::where('id', $id)->with(['members.users'])->first();

        return view('admin.kelompok.show', compact('kelompoks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelompoks = Kelompok::where('id', $id)->first();

        return view('admin.kelompok.edit', compact('kelompoks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelompoks = Kelompok::findOrFail($id);

        $kelompoksUpdate = $request->all();

        $kelompoks->update($kelompoksUpdate);

        return redirect()->route('kelompok-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelompoks = Kelompok::findOrFail($id);

        $kelompoks->delete();

        return redirect()->route('kelompok-admin.index');
    }
}
