<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModulAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moduls = Modul::all();

        return view('admin.modul.index', compact('moduls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalName();
            $fileName = date('YmdHis') . "." . $extension;
            $file->move(storage_path('app/public/modul'), $fileName);
        }

        Modul::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $fileName
        ]);

        return redirect()->route('modul-admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $moduls = Modul::where('id', $id)->first();

        return view('admin.modul.show', compact('moduls'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $moduls = Modul::where('id', $id)->first();

        return view('admin.modul.edit', compact('moduls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $moduls = Modul::findOrFail($id);

        if ($request->hasFile('file')) {
            Storage::delete("public/modul/" . $moduls->file);

            $file = $request->file('file');
            $extension = $file->getClientOriginalName();
            $fileName = date('YmdHis') . "." . $extension;
            $file->move(storage_path('app/public/modul'), $fileName);
        } else {
            $fileName = $moduls->file;
        };

        $modulsUpdate = $request->all();
        $modulsUpdate['file'] = $fileName;

        $moduls->update($modulsUpdate);

        return redirect()->route('modul-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $moduls = Modul::findOrFail($id);

        Storage::delete('public/modul/' . $moduls->file);

        $moduls->delete();

        return redirect()->route('modul-admin.index');
    }
}
