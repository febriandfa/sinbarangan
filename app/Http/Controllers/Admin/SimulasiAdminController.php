<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Simulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SimulasiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $simulasis = Simulasi::all();

        return view('admin.simulasi.index', compact('simulasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.simulasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Simulasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link' => $this->extractVideoId($request->link)
        ]);

        return redirect()->route('simulasi-admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $simulasis = Simulasi::where('id', $id)->first();

        return view('admin.simulasi.show', compact('simulasis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $simulasis = Simulasi::where('id', $id)->first();

        return view('admin.simulasi.edit', compact('simulasis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $simulasis = Simulasi::findOrFail($id);

        $simulasisUpdate = $request->all();
        $simulasisUpdate['link'] = $this->extractVideoId($request->link);

        $simulasis->update($simulasisUpdate);

        return redirect()->route('simulasi-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simulasis = Simulasi::findOrFail($id);

        $simulasis->delete();

        return redirect()->route('simulasi-admin.index');
    }

    public function extractVideoId($url)
    {
        $videoId = '';

        if (Str::contains($url, 'youtu.be')) {
            $videoId = Str::afterLast($url, '/');
        } else if (Str::contains($url, 'watch?v=')) {
            $videoId = Str::after(Str::after($url, 'watch?v='), '/');
            $videoId = Str::before($videoId, '&');
        }

        return $videoId;
    }
}
