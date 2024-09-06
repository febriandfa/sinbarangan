<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Simulasi;
use Illuminate\Http\Request;

class SimulasiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $simulasis = Simulasi::all();

        return view('guru.simulasi.index', compact('simulasis'));
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
        $simulasis = Simulasi::where('id', $id)->first();

        return view('guru.simulasi.show', compact('simulasis'));
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
